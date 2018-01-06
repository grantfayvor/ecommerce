var idToUpdate;

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
        var payload = new FormData();
        payload.append('name', $scope.updatedProduct.name);
        payload.append('brand', $scope.updatedProduct.brand);
        payload.append('categoryId', $scope.updatedProduct.categoryId);
        payload.append('details', $scope.updatedProduct.details);
        payload.append('image', $scope.updatedProduct.image);
        payload.append('status', $scope.updatedProduct.status);
        ProductService.updateProduct($scope.updatedProduct.id, payload, function (response) {
            console.log("the product was successfully updated");
        }, function (response) {
            console.log("error in updating the product " + response);
        });
    };

    // $scope.updateProduct = function () {
    //     ProductService.updateProduct($scope.updatedProduct, function (response) {
    //         console.log("the product was successfully updated");
    //     }, function (response) {
    //         console.log("error in updating the product " + response);
    //     });
    // };

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
        $scope.updatedProduct.sellingPrice = product.selling_price;
        $scope.updatedProduct.categoryId = parseInt(product.category_id);
        $scope.updatedProduct.id = parseInt(product.id);
        $scope.page = 'edit-product';
    };

    $scope.nextPage = function (url) {
        ProductService.nextPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting next page");
        });
    };

    $scope.previousPage = function (url) {
        ProductService.previousPage(url, function (response) {
            $scope.products = response.data;
        }, function (response) {
            console.log("error occured while getting previous page");
        });
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
        APIService.putWithOptions("/api/product/update?id=" + productId, productDetails, {
            transformRequest: angular.identity,
            headers: {
                'Content-Type': undefined
            }
        }, successHandler, errorHandler);
    };

    this.countProducts = function (successHandler, errorHandler) {
        APIService.get('/api/products/count', successHandler, errorHandler);
    };

    this.deleteProduct = function (id, successHandler, errorHandler) {
        APIService.delete('/api/product/delete/' + id, successHandler, errorHandler);
    };

    this.nextPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };

    this.previousPage = function (url, successHandler, errorHandler) {
        APIService.get(url, successHandler, errorHandler);
    };
}]);

app.directive("fileModel", ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function (scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function () {
                scope.$apply(function () {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);