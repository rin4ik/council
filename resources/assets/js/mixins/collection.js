export default {
    data() {
        return {
            items: []
        };
    },

    methods: {
        remove(index) {
            this.items.splice(index, 1);
            this.$emit('removed');
            flash('Reply has been deleted');
        },
        add(item) {
            this.items.unshift(item);
            this.$emit('added');
        }
    }
}