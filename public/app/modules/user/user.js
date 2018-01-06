app.controller("UserController", ['$scope', '$rootScope', 'UserService', function ($scope, $rootScope, UserService) {

    $scope.user = {};
    $scope.cartCount = 0;
    $('#updateAlert').fadeOut(0);

    $scope.initialize = function () {
        $scope.getHotProducts();
        $scope.getCartCount();
    };

    $scope.getHotProducts = function () {
        UserService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
            $scope.hotProducts.data = shuffle($scope.hotProducts.data);
        }, function () {
            console.log("error in getting hot products");
        });
    };

    $scope.getCartCount = function () {
        UserService.getCartCount(function (response) {
            $scope.cartCount = response.data;
        }, function (response) {
            console.log("error occured while getting count of the cart");
        });
    };

    $scope.getCurrentUser = function () {
        UserService.getCurrentUser(function(response) {
            $scope.user = response.data;
        }, function(response) {
            console.log("error occured while fetching user data");
        });
    };

    $scope.updateUser = function () {
        Pace.restart();
        UserService.updateUser($scope.user.id, $scope.user, function(response) {
            $('#updateAlert').fadeIn();
            $scope.updateMessage = response.data.message;
            console.log('user was successfully updated');
            // $('#updateAlert').fadeOut(10000);
        }, function(response){
            console.log('error occured while trying to update the user');
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

app.service("UserService", ['APIService', function (APIService) {

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

    this.getCartCount = function (successHandler, errorHandler) {
        APIService.get('/api/cart/count', successHandler, errorHandler);
    };

    this.getCurrentUser = function (successHandler, errorHandler) {
        APIService.get('/api/user', successHandler, errorHandler);
    };

    this.updateUser = function (userId, userDetails, successHandler, errorHandler) {
        APIService.put('/api/user/update/' +userId, userDetails, successHandler, errorHandler);
    };

}]);