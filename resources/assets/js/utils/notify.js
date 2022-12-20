const toastNotify = {
    icons: {
        success: 'nc-icon nc-check-2',
        danger: 'nc-icon nc-simple-remove',
    },

    alert: function (obj, message, type) {
        let icon = this.icons[type]

        obj.notify({
            message: `<span>` + message + `</span>`,
            icon: icon,
            type: type
        })
    },

    success: function (obj, message) {
        this.alert(obj, message, 'success')
    },

    danger: function (obj, message) {
        this.alert(obj, message, 'danger')
    },
}

export default toastNotify