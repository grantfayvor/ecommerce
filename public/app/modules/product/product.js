app.controller("ProductController", ['$scope', '$rootScope', 'ProductService', function ($scope, $rootScope, ProductService) {

	$scope.products = [];
	$scope.new_product = {};
    $scope.page = 'product-list';

	$scope.initialize = function () {
		$scope.getAllProducts();
	};

	$scope.getAllProducts = function () {
		ProductService.getAllProducts(function (response) {
			$scope.products = response.data;
		}, function (response, status) {
			console.log("an error occured while fetching the list of products");
		});
	};

	$scope.addNewProduct = function () {
		ProductService.saveProduct($scope.new_product, function (response) {
			console.log("product was added successfully");
		}, function (response, status) {
			console.log("error in adding product");
		});
	};

    $scope.updateProduct = function () {
        ProductService.updateProduct($scope.updatedProduct, function (response) {
            console.log("the product was successfully updated");
        }, function (response) {
            console.log("error in updating the product " +response);
        });
    };

	$scope.countProducts = function () {
		ProductService.countProducts(function (response) {
			$scope.productCount = response.data;
		}, function (response) {
			console.log("error in counting products");
		});
	};

	$scope.deleteProduct = function (id) {
		ProductService.deleteProduct(id, function (response) {
			console.log("product delete was successful");
            $scope.getAllProducts();
		}, function (response) {
			console.log("product delete was unsuccessful");
		});
	};

    $scope.showEditPage = function (product) {
        $scope.updatedProduct = product;
        $scope.page = 'edit-product';
    };

}]);

app.service("ProductService", ['APIService', function (APIService) {

	this.getAllProducts = function (successHandler, errorHandler) {
		APIService.get("/api/products", successHandler, errorHandler);
	};

	this.saveProduct = function (productDetails, successHandler, errorHandler) {
		APIService.post("/api/product/save", productDetails, successHandler, errorHandler);
	};

    this.updateProduct = function (productId, productDetails, successHandler, errorHandler) {
        APIService.put("/api/product/update/"+productId, productDetails, successHandler, errorHandler);
    };

	this.countProducts = function (successHandler, errorHandler) {
		APIService.get('/api/products/count', successHandler, errorHandler);
	};

	this.deleteProduct = function (id, successHandler, errorHandler) {
		APIService.get('/api/product/delete/'+id, successHandler, errorHandler);
	};
}]);