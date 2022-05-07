<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import SearchProducts from "./SearchProducts";
    import { Link } from '@inertiajs/inertia-vue3'
    import TextInput from "../Shared/TextInput";
    import LoadingButton from '../Shared/Button'
    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import axios from 'axios'
    import {toRaw} from "@vue/reactivity";

    export default {
        // mounted() {
        //     console.log('the vuex store is ',this.$store.state); // this.$store
        // },
        components:{
            AppLayout,
            SearchProducts,
            LoadingButton,
            TextInput,
            Link
        },
        props: {
            // filters: Object,
            products: Array,
        },
        data(){
            return{
                cart: [],
                grandTotal: 0,

                form: this.$inertia.form({
                    cart: '',
                    total: 0,
                    name: '',
                    payment_method: 'cash'
                }),
            }
        },
        methods: {
            addItemToCart(product){
                let itemInCart = this.cart.find(item => item.id === product.id);
                if(itemInCart){
                    itemInCart.quantity += 1;
                    itemInCart.subTotal = itemInCart.sales_price * itemInCart.quantity;
                    this.calculateTotal(this.cart)

                    return;
                }else {
                    product.quantity = 1;
                    product.subTotal = product.sales_price;
                }
                this.cart.push(product);
                this.calculateTotal(this.cart)

            },
            updateItemQuantity(index, qty){
                if(qty === '') qty = 1;
                this.cart[index].quantity =  qty;
                this.cart[index].subTotal = this.cart[index].quantity * this.cart[index].sales_price;
                this.calculateTotal(this.cart)

            },
            removeItemFromCart(index){
                this.cart.splice(index, 1);
                this.calculateTotal(this.cart)

            },
            calculateTotal(cart){
                this.grandTotal = 0;
                for(let i = 0; i < cart.length; i++){
                    this.grandTotal = this.grandTotal + (cart[i].quantity * cart[i].sales_price)
                }
            },
            emptyCart(){
                this.cart = [];
            },
            processOrder(){

                this.form['cart'] = JSON.stringify(this.cart);
                this.form['total'] = this.grandTotal;
                this.form.post('/sales')

            }
        },


    }

</script>
<template>
    <AppLayout title="Products">
        <template #icon>
            <i class="fa-solid fa-timeline"></i>
        </template>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight inline">
                Sales
            </h2>
        </template>

        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-1 lg:px-1">
                <div class="my-2">
                    <div class="mb-4">

                        <search-products @addItem="addItemToCart($event)" :products="products" />
                        <div class="md:grid md:grid-cols-12 md:gap-2">

                            <div class="md:col-span-8 ">

                                <div class="col-span-12 sm:col-span-12 rounded-lg shadow-md inline-block min-w-full overflow-hidden">
                                    <div class="px-5 py-3 bg-white border-t rounded-t-lg flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                        <div class="inline-flex justify-between mt-2 xs:mt-0 text-right rounded-t-lg">
                                            <h3 class="font-bold">Cart</h3>
                                            <button type="button" @click="emptyCart" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
                                                rounded-md text-white bg-indigo-600 hover:bg-indigo-700
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Empty Cart
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table-auto min-w-full leading-normal">
                                        <thead>
                                        <tr>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left  font-semibold text-gray-600  tracking-wider">
                                                Item
                                            </th>
                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                                Price
                                            </th>

                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                                Quantity
                                            </th>

                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                                Total
                                            </th>

                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">
                                                Stock
                                            </th>

                                            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider whitespace-nowrap">
                                                <i class="fa-solid fa-xmark"></i>
<!--                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">-->
<!--                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />-->
<!--                                                </svg>-->
                                            </th>
                                            <!--                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left font-semibold text-gray-600  tracking-wider">-->
                                            <!--                                        Action-->
                                            <!--                                    </th>-->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(item, index) in cart" class="font-medium">
                                            <td class="px-2 py-3 border-b border-gray-200 bg-white text-md">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-10 h-10">
                                                        <img class="w-full h-full rounded-lg"
                                                             :src="item.photo == null ? 'https://c8.alamy.com/comp/2BDX8K1/cartoon-girl-holding-something-in-her-hands-placeholder-2BDX8K1.jpg':'/storage/'+ item.photo"
                                                             :alt="item.name" />
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ item.name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">₦{{item.sales_price}}</td>
                                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">
                                                <input type="number" id="quantity" v-model.number="item.quantity" @input="updateItemQuantity(index, item.quantity)" @change="updateItemQuantity(index, item.quantity)" class="bg-gray-50 border border-gray-300 text-gray-900
                                                 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="1" required></td>
                                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">₦{{item.sales_price * item.quantity }}</td>
                                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-md">{{ item.stock }}</td>
                                            <td class="px-5 py-3 border-b border-gray-200 bg-white text-md text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" @click="removeItemFromCart(index)" class="h-6 w-6 mx-auto cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </td>
                                        </tr>
                                        <tr v-if="cart.length === 0" class="font-medium">
                                            <td colspan="6" class="my-6">

                                                    <h4 class="font-bold  py-10 mx-auto text-center text-gray-400">

                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                        Cart is empty</h4>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="px-5 py-3 bg-white border-t flex flex-col xs:flex-row-reverse items-right xs:justify-end ">
                                        <div class="inline-flex mt-2 xs:mt-0 text-right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" md:col-span-4 rounded-lg shadow-md inline-block min-w-full overflow-hidden bg-white">
                                <form @submit.prevent="processOrder">
                                    <div class="flex justify-between border-b p-3">
                                        <div class="font-bold text-xl text-gray-500">Total</div>
                                        <div class="font-bold text-xl text-gray-500">₦{{grandTotal}}</div>
                                    </div>
                                    <div class="p-3">
                                        <text-input v-model="form.name" :error="form.errors.name" required label="Customer Name"/>
                                    </div>
                                    <div class="flex flex-col mt-1 ml-3 mb-3">
                                        <div class="">
                                            <div class="font-medium text-md text-gray-500">Payment Method</div>
                                        </div>
                                        <div class="flex mt-3 mb-2">
                                            <div class="flex items-center mr-4">
                                                <input checked="" id="inline-checked-radio" type="radio" value="cash" v-model="form.payment_method" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cash</label>
                                            </div>
                                            <div class="flex items-center mr-8">
                                                <input id="inline-2-radio" type="radio" value="POS" name="inline-radio-group" v-model="form.payment_method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Point of Sale</label>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mr-3" v-if="cart.length > 0">
                                            <loading-button   :loading="form.processing">
                                                Process order
                                            </loading-button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<style scoped>

</style>



