/**
 * Created by Kamran on 30-Nov-15.
 */




(function(){

    var app=angular.module('store',[]);

    app.controller('StoreController',function(){
    this.products=gems;
    });

    app.controller('PanelController',function(){
    this.tab=1;
    this.selectTab= function (setTab){
        this.tab=setTab;
    };

    this.isSelected=function(checkTab){
      return this.tab===checkTab;
    };

    });


    app.controller('TabController', function(){
        this.tab=1;

        this.setTab = function(selectedtTab) {
            this.tab=selectedtTab;
        };

        this.isSet=function(checkTab){
            return this.tab===checkTab;
        };

    });



    var gems=[
        {
        name: 'Dodecahedeon',
        price:2.9,
        description:'some descr about this product Dodecahedeon ',
        canPurchase:true,
        soldOut:true
    },
        {
            name: 'Pentagonal m',
            price:9.95,
            description:'I have never seen such a piece of Art often reffered as the jewel of the universe. Aound 2500 years ago we have seen emerging in underground of the Persian empire of Cyrus that amazing stone',
            canPurchase:false,
            soldOut:false
        }
    ]
})();