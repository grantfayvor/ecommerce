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
            $scope.hotProducts.data = $scope.hotProducts.data.splice(0, 2);
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
        UserService.getCurrentUser(function (response) {
            $scope.user = response.data;
        }, function (response) {
            console.log("error occured while fetching user data");
        });
    };

    $scope.getAllUsers = function () {
        // Pace.restart();
        UserService.getAllUsers(function (response) {
            $scope.users = response.data;
        }, function (response) {
            console.log("error occured while fetching all users");
        });
    };

    $scope.makeAdmin = function () {
        Pace.restart();
        UserService.makeAdmin($scope.userIdToMakeAdmin, {
            'adminStatus': $scope.adminStatus,
            'password': $scope.confirmPassword
        }, function (response) {
            $('#makeAdminModal').modal('hide');
            $scope.confirmPassword = "";
            $scope.getAllUsers();
            console.log("user was successfully made an admin");
        }, function (response) {
            $scope.makeAdminMessage = response.data.message;
            $scope.confirmPassword = "";
            console.log("error occured  while trying to make user an admin");
        });
    };

    $scope.showMakeAdminModal = function (userId, currentIndex) {
        $scope.userIdToMakeAdmin = userId;
        $scope.adminStatus = $('#adminToggle' + currentIndex).is(':checked');
        $('#makeAdminModal').modal({
            backdrop: 'static', show: true
        });
    };

    $scope.closeMakeAdminModal = function () {
        $scope.makeAdminMessage = "";
        $scope.confirmPassword = "";
        $('#makeAdminModal').modal('hide');
        $scope.getAllUsers();        
    };

    $scope.updateUser = function () {
        Pace.restart();
        UserService.updateUser($scope.user.id, $scope.user, function (response) {
            $('#updateAlert').fadeIn();
            $scope.updateMessage = response.data.message;
            console.log('user was successfully updated');
        }, function (response) {
            console.log('error occured while trying to update the user');
        });
    };

    $scope.deleteUser = function () {
        Pace.restart();
        
        UserService.deleteUser($scope.userIdToDelete, $scope.confirmPassword, function (response) {
            $scope.deleteUserMessage = response.data.original ? response.data.original.message : '';
            if($scope.deleteUserMessage !== 'your password is incorrect'){
                $('#deleteModal').modal('hide');
                $scope.getAllUsers();
                console.log("user was successfully deleted");
            }
            $scope.confirmPassword = "";
        }, function (response) {
            $scope.deleteUserMessage = response.data.original.message;
            $scope.confirmPassword = "";
            console.log("user could not be deleted");
        });
    };

    $scope.searchByParam = function () {
        UserService.search($scope.searchParam, function (response) {
            $scope.users = response.data;
        }, function(response) {
            console.log("error occured while trying to get the searched for users");
        });
    };

    $scope.showDeletePage = function (userId) {
        $scope.userIdToDelete = userId;
        $('#deleteModal').modal('show');
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

    $scope.confirmPhoneNumber = function () {
        var regExp = new RegExp('[e]');
        if(isNaN($scope.phoneNumber)){
            $scope.phoneError = "phone number should consist of numbers";
        } else if(regExp.test($scope.phoneNumber)) {
            $scope.phoneError = "phone number should consist of numbers";
        }
         else {
            $scope.phoneError = null;
        }
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

    this.search = function (param, successHandler, errorHandler) {
        APIService.get("/api/users/search/" + param, successHandler, errorHandler);
    };

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
        APIService.put('/api/user/update/' + userId, userDetails, successHandler, errorHandler);
    };

    this.makeAdmin = function (userId, details, successHandler, errorHandler) {
        APIService.put('/api/user/admin/' + userId, details, successHandler, errorHandler);
    };

    this.getAllUsers = function (successHandler, errorHandler) {
        APIService.get('/api/users', successHandler, errorHandler);
    };

    this.deleteUser = function (userId, password, successHandler, errorHandler) {
        APIService.delete('/api/user/delete?id=' + userId +'&p=' +password, successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

}]);
