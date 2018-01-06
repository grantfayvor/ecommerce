app.controller("UserController", ['$scope', '$rootScope', 'UserService', function($scope, $rootScope, UserService){

	$scope.user = {};
	$scope.credentials = {};
	$scope.new_user = {};
	$scope.loggedIn = true;

	$scope.login = function(){
		UserService.authenticateUser($scope.credentials, function (response) {
			/*if (response.data.role == "USER") {
				window.location.href = "../../glow/resources/index.php";
			} else if (response.data.role == "ADMIN") {
				window.location.href = "../../glow/resources/admin.php";
			} else {
				$scope.loggedIn = false;
			}*/
			window.location.href = "../../glow/resources/index.php";
		}, function (response, status) {
			$scope.loggedIn = false;
			console.log(response.data);
		});
	};

	$scope.register = function(){
		UserService.registerUser($scope.new_user, function (response) {
			if (response.data.result === true) {
				console.log("the user has successfully been registered " + response.data);
				$scope.registered = 1;
				$scope.credentials.username = $scope.new_user.username;
				$scope.credentials.password = $scope.new_user.password;
				$scope.login();
			} else {
				$scope.registered = 0;
			}	
		}, function(response, status){
			console.log(response.data);
		});
	};

	$scope.registerAdmin = function(){
		UserService.registerUser($scope.new_user, function (response) {
			if (response.data.result === true) {
				console.log("the user has successfully been registered " + response.data);
				$scope.registered = 1;
				setTimeout(function () {
					$("#fade1").fadeOut(5000);
					$scope.registered = 2;
				}, 1000);
			} else {
				$scope.registered = 0;
				setTimeout(function () {
					$("#fade2").fadeOut(5000);
					$scope.registered = 2;
				}, 1000);
			}	
		}, function(response, status){
			console.log(response.data);
		});
    };
    
    $scope.getHotProducts = function () {
        UserService.getHotProducts(function (response) {
            $scope.hotProducts = response.data;
            $scope.hotProducts.data = shuffle($scope.hotProducts.data);
        }, function () {
            console.log("error in getting hot products");
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

app.service("UserService", ['APIService', function(APIService){

    this.getHotProducts = function (successHandler, errorHandler) {
        var status = "HOT";
        APIService.get("/api/products/status/" + status + "", successHandler, errorHandler);
    };

	this.authenticateUser = function(userDetails, successHandler, errorHandler){
		APIService.post("/api/user/authenticate", userDetails, successHandler, errorHandler);
	};

	this.registerUser = function(userDetails, successHandler, errorHandler){
		APIService.post("/api/user/save", userDetails, successHandler, errorHandler);
	};
	
}]);