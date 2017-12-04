app.controller("MainController", ['$rootScope', '$scope', 'MainService', function ($rootScope, $scope, MainService) {

    $scope.products = [];
    $scope.hotProducts = [];
    $scope.show = false;

    $scope.initialize = function () {
        $scope.getHotProducts();
        $scope.getAllPhones();
        $scope.getRecommendedProducts();
    };

    $scope.getHotProducts = function () {
        MainService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
        }, function () {
            console.log("error in getting hot products");
        });
    };

    $scope.getRecommendedProducts = function () {
        MainService.getRecommendedProducts(function (response) {
            $scope.recommendedProducts = response.data;
        }, function (response) {
            console.log("error in getting recommended products");
        });
    };

    $scope.getAllPhones = function () {
        MainService.findAllPhones(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching phones");
        });
    };

    $scope.getAllLaptops = function () {
        MainService.findAllLaptops(function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error in fetching laptops");
        });
    };

    $scope.getAllProducts = function () {
        MainService.getAllProducts(function (response) {
            $scope.products = response.data;
        }, function (response, status) {
            console.log("an error occured while fetching the list of products");
        });
    };

    $scope.addToCart = function (product) {
        var selectedProduct = {
            "product": product
        };
        MainService.addToCart(selectedProduct, function (response) {
            $('#cartModal').modal('show');
            console.log("product has been added to cart");
        }, function (response, status) {
            console.log("error in adding the product to cart");
        });
    };

    $scope.addItemClass = function (index) {
        if (index == 2) {
            //$('#hot').addClass('active');
            setTimeout(function() {
                document.getElementById('hot').classList.add('active');
                $scope.show = true;
            }, 100);
        }
        return index;
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

    this.findAllPhones = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=1', successHandler, errorHandler);
    };

    this.findAllLaptops = function (successHandler, errorHandler) {
        APIService.get('/api/products/find?q=2', successHandler, errorHandler);
    };

    this.addToCart = function (selectedProduct, successHandler, errorHandler) {
        APIService.post("/api/cart/put{" + selectedProduct.product.id + "}", selectedProduct, successHandler, errorHandler);
    };
}]);