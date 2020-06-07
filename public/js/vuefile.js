const base_url = 'http://localhost/PasarTradisional/public/';
var app = new Vue({
    el : "#cart",
    data:{
        cart : 0,
        items: null,
        carts : [],
        user : null
    },
    created(){
        axios.get(base_url+'Home/itemsData').then(value => {
            this.items = value["data"]
        });
        axios.get(base_url+'Home/getUser/').then(value => {
            this.user = value["data"]["response"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                console.log(value["data"]);
                this.cart = value["data"]["response"];
            });
            console.log(base_url+'Cart/allCart/'+this.user);
            axios.get(base_url+'Cart/allCart/'+this.user).then(value => {
                this.carts = value["data"];
                console.log(this.carts);
            });
        });
    },
    methods:{
        deleteCart(cart){
            axios.get(base_url+'Cart/deleteCart/'+cart.id).then(value => {
                console.log(value["data"]);
            });
            cart.status = 'checkout';
            cart.quantity = 0;
            this.cart--;
        },
        updateCart(cart){
            axios.get(base_url+'Cart/updateCart/'+cart['id']+'/'+cart.quantity).then(value => {
                    console.log(value["data"])
                })
        },
        updateNoteCart(cart){
            axios.post(base_url+'Cart/updateNoteCart/',{note:cart.item_note,id:cart['id']}).then(value => {
                console.log(value)
            })
        }
    },
    computed: {
        totalItem(){
            let sum = 0;
            this.carts.forEach(function(item) {
                sum += (item.price * item.quantity);
            });

            return sum;
        }
    }
});

var app2 = new Vue({
    el:"#register",
    data: {
        username : "",
        isAvailable: true
    },
    methods:{
        checkUsername(){
            console.log("Request : "+this.username)
            axios.post(base_url+'Authentication/ajaxFindUsername/'+this.username)
                .then(value => {
                    this.isAvailable = value["data"]["isAvailable"];
                })
                .catch(reason => console.log(reason));

        }
    }
});

var app3 = new Vue({
    el:"#home",
    data:{
        cart : 0,
        items: null,
        src:base_url+'uploads/',
        user: null
    },
    mounted(){
        axios.get(base_url+'Home/itemsData').then(value => {
            this.items = value["data"]
        });
        axios.get(base_url+'Home/getUser/').then(value => {
            this.user = value["data"]["response"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                console.log(value["data"]);
                this.cart = value["data"]["response"];
            });
        });

    },
    methods: {
        insertCart(item,user){
            console.log("item: "+item);
            console.log("item: "+user)
            axios.get(base_url+'Home/addToCart/'+item+'/'+user).then(value => {
                console.log(value['data']);
                if (value['data']['response']){
                    this.cart++;
                }
            })
        }
    }
});

var app4 = new Vue({
    el:"#checkout",
    data:{
        cart : 0,
        items: null,
        carts : [],
        subDistricts : [],
        user: null,
        userData :{},
        radioAddress: 'true',
        deliveryFee : 0,
        select:0,
        agreement:null
    },
    created(){
        axios.get(base_url+'Home/itemsData').then(value => {
            this.items = value["data"]
        });
        axios.get(base_url+'Checkout/getUser/').then(value => {
            this.user = value["data"]["id"];
            this.select = value["data"]["subdistrict_id"];
            this.userData = value["data"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                this.cart = value["data"]["response"];
            });
            console.log(base_url+'Cart/allCart/'+this.user);
            axios.get(base_url+'Cart/allCart/'+this.user).then(value => {
                this.carts = value["data"];
                console.log(this.carts);
            });
        });
        axios.get(base_url+'Checkout/getSubDistrict').then(value => {
            this.subDistricts = value["data"]
        });
    },
    computed: {
        totalItem(){
            let sum = 0;
            this.carts.forEach(function(item) {
                sum += (item.price * item.quantity);
            });
            return sum;
        },
        fee(){
            if (this.radioAddress === 'true'){
                if (Array.isArray(this.subDistricts) && this.subDistricts.length){
                    return this.subDistricts[this.userData.subdistrict_id-1].price;
                }else {
                    return 0;
                }
            }else {
                if (this.select==='0'){
                    return 0;
                }else {
                    return this.subDistricts[this.select-1].price;
                }
            }
        },
        modelAddress(){
            if (this.radioAddress === 'true'){
                return this.userData.address
            }else {
                return ""
            }
        },
        modelZip(){
            if (this.radioAddress === 'true'){
                return this.userData.zip
            }else {
                return ""
            }
        },
        modelEmail(){
            if (this.radioAddress === 'true'){
                return this.userData.email
            }else {
                return ""
            }
        },
        modelPhone(){
            if (this.radioAddress === 'true'){
                return this.userData.telephone
            }else {
                return ""
            }
        },
        selected:{
            get(){
                if (this.radioAddress === 'true'){
                    return this.userData.subdistrict_id
                }else {
                    return 0
                }
            },
            set(value){
                this.userData.subdistricts_id = value
            }
        },
    }
});

var app5 = new Vue({
    el:'#history',
    data:{
        cart : 0,
        user : {}
    },
    created(){
        axios.get(base_url+'Home/getUser/').then(value => {
            this.user = value["data"]["response"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                console.log(value["data"]);
                this.cart = value["data"]["response"];
            });
        });
    }
});

var app6 = new Vue({
    el:'#contact',
    data:{
        cart : 0,
        user : {}
    },
    created(){
        axios.get(base_url+'Home/getUser/').then(value => {
            this.user = value["data"]["response"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                console.log(value["data"]);
                this.cart = value["data"]["response"];
            });
        });
    }
});

var app7 = new Vue({
    el:'#shop',
    data:{
        cart : 0,
        items: null,
        src:base_url+'uploads/',
        user: null
    },
    created(){
        axios.get(base_url+'Home/itemsData').then(value => {
            this.items = value["data"]
            console.log(this.items)
        });
        axios.get(base_url+'Home/getUser/').then(value => {
            this.user = value["data"]["response"];
            axios.get(base_url+'Home/allCart/'+this.user).then(value => {
                console.log(value["data"]);
                this.cart = value["data"]["response"];
            });
        });
    },
    methods: {
        insertCart(item,user){
            console.log("item: "+item);
            console.log("item: "+user)
            axios.get(base_url+'Home/addToCart/'+item+'/'+user).then(value => {
                console.log(value['data']);
                if (value['data']['response']){
                    this.cart++;
                }
            })
        }
    }
});