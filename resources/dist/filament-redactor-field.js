class ClassWatcher {
    observer = null;

    constructor(targetNode, classChangedCallback) {
        const observer = new MutationObserver(mutations => {
            for (const item of mutations) {
                if (item.attributeName === 'class') {
                    classChangedCallback();
                }
            }
        });

        observer.observe(targetNode, {attributes: true});

        this.observer = observer;
    }

    destroy() {
        this.observer.disconnect();
    }
}

document.addEventListener('alpine:init', () => {
    Alpine.data('redactorEditor', (state, params) => ({
        state: state,
        params: params,
        instance: null,
        classWatcher: null,

        init() {
            this.classWatcher = new ClassWatcher(document.documentElement, () => {
                this.$el
                    .parentNode
                    .querySelector('.rx-container')
                    .setAttribute('rx-data-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
            });

            this.instance = window.Redactor(this.$el, {
                subscribe: {
                    'editor.change': html => {
                        params.updateUsing(html.data.html);
                    },
                },
                plugins: this.params.plugins ?? [],
                theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                limiter: this.params.limiter,
            });

            this.$watch('state', () => {
                if (this.state !== this.instance.editor.getContent()) {
                    this.instance.editor.setContent({html: this.state});
                }
            });
        },
        destroy() {
            this.classWatcher.destroy();
            this.instance.destroy();
        }
    }));
});
