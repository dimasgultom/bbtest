@extends('layouts.app')
@section('content')
<h1 class="text-center">List of games with order and filter feature</h1>
<div class="row content">
    <div class="col-sm-9">
    @if(count($games)>0)
    order by: <select ng-model="selectedOrder" ng-options="option for option in options"></select>
    @foreach($games as $game)
    
    <div class="row content">
        <div class="col-sm-3">Some Image here</div>
        <div class="col-sm-4"><strong>{{$game->title}}</strong></div>
        <div class="col-sm-3">{{$game->category}}</div>
        <div class="col-sm-2 text-center"><a href="/games/{{$game->id}}" class="btn btn-primary btn-xs">Detail</a></div>
    </div>

    @endforeach
    {{$games->links()}}
    @else
    <p>Server Under Maintenance</p>
    @endif
    </div>
    <div class="col-sm-3 sidenav">
        <div>
            <!--filter title-->
            <input type="text" ng-model="findtitel" placeholder="Search">
        </div><br>
        <div>
          Game Cattegory
          <div align="left" ng-repeat="tech in category">
            <label><input type="checkbox" ng-model="tech.on">category</label>
          </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
// Get the modal.
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

angular.module('app', [])
.controller('ctrl', function($scope) {
  $scope.options = ['title','rate'];
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
    $scope.games = $data;
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