@extends('layouts.app')
@section('content')
<div class="row content">
      <div class="col-sm-9">
        <h1 align="center">Game List</h1>
        <hr>
          order by: <select ng-model="selectedOrder" ng-options="option for option in options"></select>
          <div ng-repeat="x in games | filter:{title: findtitel} | customFilter:(category|filter:{on:true}) | orderBy:selectedOrder" class="row" >
            <div class="col-sm-2 text-center"><strong><%x.id%></strong></div>
            <div class="col-sm-4 text-center"><strong><%x.title%></strong></div>
			<div class="col-sm-2 text-left"><%x.price%></div>
            <div class="col-sm-2"><%x.category%></div>
            <div class="col-sm-2 text-center"><a href="#" class="btn btn-primary btn-xs">Detail</a></div>
          </div>
      </div>

      <div class="col-sm-3 sidenav">
        <div>
          <!--filter title-->
          <input type="text" ng-model="findtitel" placeholder="Search">
        </div>
        <div>
          Game Cattegory
          <div align="left" ng-repeat="tech in category">
            <label><input type="checkbox" ng-model="tech.on"><%tech.category%></label>
          </div>
        </div>
        <br>
        <div>
          Avg. Rate
          <div align="left">
            <a href="#">4 Star &amp; Up</a><br>
            <a href="#">3 Star &amp; Up</a><br>
            <a href="#">2 Star &amp; Up</a><br>
            <a href="#">1 Star &amp; Up</a><br>
          </div>
        </div>
      </div>
</div>
@endsection

@section('js')
<script>
angular.module('app', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    })
.controller('ctrl', function($scope) {
  $scope.options = ['title','price'];
  $scope.category = [
    {category: "Action Adventure", on: false},
    {category: "Racing", on: false},
    {category: "Swordplay", on: false},
    {category: "Adventure", on: false},
    {category: "Action Adventur", on: false},
    {category: "Sport", on: false},
    {category: "Open World", on: false},
    {category: "RPG", on: false},
    {category: "Simulation", on: false},
    {category: "Turn Based", on: false},
    {category: "Strategy",on: false}];
  $scope.games = <?php echo $games; ?>;
})
.filter('customFilter', function() {
  return function(input, titles) {
    if(!titles || titles.length === 0) return input;
    var out = [];
    angular.forEach(input, function(item) {
      angular.forEach(titles, function(tech) {
        if (item.category === tech.category) {
          out.push(item);
        }
      });
    });
    return out;
  }
});
</script>
@endsection