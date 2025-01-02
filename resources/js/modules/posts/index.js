Alpine.data('list_post', () => ({
    posts: [],
    formData: {
        title: '',
        content: '',
        image: '',
    },
    errors: {},

    init() {
        this.loadPosts();
    },

    loadPosts() {
        axios.get('/get-posts')
            .then((response) => {
                this.posts = response.data.posts;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    storePost() {
        this.errors = {};

        axios.post('/posts', {
            title: this.formData.title,
            content: this.formData.content,
            image: this.formData.image,
        })
            .then((response) => {
                this.loadPosts();
                this.resetForm();
            })
            .catch((error) => {
                this.errors = error.response.data.errors;
            });
    },
    clearError(field){
        delete this.errors[field];
    },
    resetForm(){
        this.errors = {};
        for (let formDataKey in this.formData) {
            this.formData[formDataKey] = '';
        }
    },
}))
