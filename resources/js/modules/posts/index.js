Alpine.data('list_post', () => ({
    posts: [],
    title: '',
    content: '',
    image: '',

    init() {
        this.loadPosts();
    },

    loadPosts() {
        axios.get('/get-posts')
            .then((response) => {
                console.log(response);
                this.posts = response.data.posts;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    storePost() {
        axios.post('/posts', {
            title: this.title,
            content: this.content,
            image: this.image,
        })
            .then((response) => {
                console.log(response);
                // this.posts.push(response.data.post);
                this.loadPosts();
            })
            .catch((error) => {
                // console.log(error);
                this.handleError(error.response.data.errors);
            });
    },

    handleError(errors) {
        for (const [key, value] of Object.entries(errors)) {
            document.getElementById(key).classList.add('border-red-500')
            document.getElementById(key).after(value[0])
        }
    },
}))
