const Counter = {
    data() {
        return {
            categories: [],
            products: [],
        }
    },
    async created() {
        const responseC = await fetch("http://test-task.loc/api/categories");
        const dataC = await responseC.json();
        this.categories = dataC;

        const responseP = await fetch("http://test-task.loc/api/products");
        const dataP = await responseP.json();
        this.products = dataP;
    },
    mounted() {}
}
  
Vue.createApp(Counter).mount('#vue-app-container')