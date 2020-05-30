var app = new Vue({
    el : "#cart",
    data:{
        carts : [
            {
                name : "Sepatu",
                price : 4,
                quantity : 3,
                isCart : true
            },
            {
                name : "Sandal",
                price : 4,
                quantity : 1,
                isCart : true
            },
            {
                name : "Mouse",
                price : 4,
                quantity : 1,
                isCart : true
            }
        ]
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
            axios.post('http://localhost/PasarTradisional/public/Authentication/ajaxFindUsername/'+this.username)
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
        src:'http://localhost/PasarTradisional/public/uploads/'
    },
    mounted(){
        axios.get('http://localhost/PasarTradisional/public/Home/itemsData').then(value => {
            this.items = value["data"];
            console.log(this.items);
        })
    },
    methods: {
        insertCart(item,user){
            console.log("item: "+item);
            console.log("item: "+user)
            axios.get('http://localhost/PasarTradisional/public/Home/addToCart/'+item+'/'+user).then(value => {
                console.log(value['data']);
                if (value['data']['response']){
                    this.cart++;
                }
            })
        }
    }
});