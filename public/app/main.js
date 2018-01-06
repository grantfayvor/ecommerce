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
        $scope.getAllBooks();
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

    $scope.getAllBooks = function () {
        Pace.restart();
        MainService.findAllBooks(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching books");
        });
    };

    $scope.getAllCards = function () {
        Pace.restart();
        MainService.findAllCards(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching cards");
        });
    };

    $scope.getAllCharts = function () {
        Pace.restart();
        MainService.findAllCharts(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching charts");
        });
    };

    $scope.getAllLearningAids = function () {
        Pace.restart();
        MainService.findAllLearningAids(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching learning aids");
        });
    };

    $scope.getAllProducts = function () {
        MainService.getAllProducts(function (response) {
            $scope.products = response.data;
        }, function (response, status) {
            console.log("an error occurred while fetching the list of products");
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

    $scope.productInfo = function (product) {
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

    this.findAllBooks = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=1', successHandler, errorHandler);
    };

    this.findAllCards = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=2', successHandler, errorHandler);
    };

    this.findAllCharts = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=3', successHandler, errorHandler);
    };

    this.findAllLearningAids = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=4', successHandler, errorHandler);
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