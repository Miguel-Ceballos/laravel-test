Alpine.data('list_permission', () => ({
    permissions: [],
    formData: {
        name: '',
        guard_name: '',
    },

    init() {
        this.loadPermissions();
    },

    loadPermissions() {
        axios.get('/get-permissions')
            .then((response) => {
                console.log(response);
                this.permissions = response.data.permissions;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    storePermission() {
        axios.post('/permissions', {
            name: this.formData.name,
            guard_name: this.formData.guard_name,
        })
            .then((response) => {
                console.log(response);
                this.resetForm();
                this.loadPermissions();
            })
            .catch((error) => {
                console.log(error);
                this.handleError(error.response.data.errors);
            });
    },

    resetForm() {
        this.formData.name = '';
        this.formData.guard_name = '';
    },

    handleError(errors) {
        for (const [key, value] of Object.entries(errors)) {
            document.getElementById(key).classList.add('border-red-500')
            document.getElementById(key).after(value[0])
        }
    },
}))
