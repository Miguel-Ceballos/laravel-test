Alpine.data('list_role', () => ({
    roles: [],
    name: '',
    area: '',

    init() {
        this.loadRoles();
    },

    loadRoles() {
        axios.get('/get-roles')
            .then((response) => {
                console.log(response);
                this.roles = response.data.roles;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    storeRole() {
        axios.post('/roles', {
            name: this.name,
            area: this.area,
        })
            .then((response) => {
                console.log(response);
                this.loadRoles();
            })
            .catch((error) => {
                console.log(error);
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
