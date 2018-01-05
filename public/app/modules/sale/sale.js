app.controller('SaleController', ['$scope', 'SaleService', function($scope, SaleService){

    $scope.sales = [];

    $scope.initialize = function(){
        $scope.getAllSales();
    };

    $scope.getAllSales = function(){
        SaleService.getAllSales(function(response){
            $scope.sales = response.data;
        }, function(response){
            console.log("error getting sales");
        });
    };

}]);

app.service('SaleService', ['APIService', function(APIService){

    this.getAllSales = function (successHandler, errorHandler) {
        APIService.get('/api/sales', successHandler, errorHandler);
    };
}]);