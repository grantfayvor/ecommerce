app.controller("MainController", ['$rootScope', '$scope', 'MainService', 
function ($rootScope, $scope, MainService) {

    $scope.products = [];
    $scope.hotProducts = [];
    $scope.show = false;
    $scope.page = 'products';
    $scope.cartCount = 0;

    $scope.initialize = function () {
        $scope.getHotProducts();
        $scope.getCartCount();
        $scope.getAllByCategory(1);
        $scope.getRecommendedProducts();
    };

    $scope.getHotProducts = function () {
        MainService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
            $scope.hotProducts.data = shuffle($scope.hotProducts.data);
        }, function () {
            console.log("error in getting hot products");
        });
    };

    $scope.getRecommendedProducts = function () {
        MainService.getRecommendedProducts(function (response) {
            $scope.recommendedProducts = response.data;
            $scope.recommendedProducts.data = shuffle($scope.recommendedProducts.data);
        }, function (response) {
            console.log("error in getting recommended products");
        });
    };

    $scope.getAllProducts = function () {
        MainService.getAllProducts(function (response) {
            $scope.products = response.data;
        }, function (response, status) {
            console.log("an error occurred while fetching the list of products");
        });
    };

    $scope.getAllByCategory = function (categoryId) {
        Pace.restart();
        MainService.findAllByCategory(categoryId, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching learning aids");
        });
    };

    $scope.getCartCount = function () {
        MainService.getCartCount(function(response){
            $scope.cartCount = response.data;
        }, function(response) {
            console.log("error occured while getting count of the cart");
        });
    };

    $scope.addToCart = function (product) {
        Pace.restart();
        var selectedProduct = {};
        selectedProduct.details = {
            "id": product.id,
            "name": product.name,
            "qty": 1,
            "price": product.selling_price
        };
        selectedProduct.details.options = {
            "image_location": product.image_location,
            "subtotal": selectedProduct.details.price * selectedProduct.details.qty
        };
        MainService.addToCart(selectedProduct, function (response) {
            $scope.getCartCount();
            $('#cartModal').modal('show');
            console.log("product has been added to cart");
        }, function (response, status) {
            console.log("error in adding the product to cart");
        });
    };

    $scope.searchByParam = function () {

        MainService.search($scope.searchParam, function (response) {
            if (!response.data.message) {
                $scope.products = response.data;
            } else {
                $scope.productsMessage = response.data.message;
            }
        });
    };

    $scope.productInfo = function (product) {
        Pace.restart();
        $scope.currentProduct = product;
        $scope.page = 'product-details';
    };

    $scope.addItemClass = function (index) {
        if (index == 2) {
            //$('#hot').addClass('active');
            setTimeout(function () {
                document.getElementById('hot').classList.add('active');
                $scope.show = true;
            }, 100);
        }
        return index;
    };

    $scope.nextPage = function (url) {
        Pace.restart();
        MainService.nextPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        Pace.restart();
        MainService.previousPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
    };

    var shuffle = function (array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    };

}]);

app.service("MainService", ['APIService', function (APIService) {

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/product/search/" + param, successHandler, errorHandler);
    };

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getRecommendedProducts = function (successHandler, errorHandler) {
        var status = "COLD";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getAllProducts = function (successHandler, errorHandler) {
        APIService.get("/api/products", successHandler, errorHandler);
    };

    this.saveProduct = function (productDetails, successHandler, errorHandler) {
        APIService.post("/api/product/save", productDetails, successHandler, errorHandler);
    };

    this.findAllByCategory = function (categoryId, successHandler, errorHandler) {
        APIService.get('/api/products/find?q=' + categoryId, successHandler, errorHandler);
    };

    this.addToCart = function (selectedProduct, successHandler, errorHandler) {
        APIService.post("/api/cart/add", selectedProduct, successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };
}]);