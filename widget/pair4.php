<div ng-app="app" class="container" style="margin-top: 24px;">
  <div ng-controller="pairController as vm">
    <div class="row">
      <div class="col-xs-4">   
        <table class="table table-condensed table-striped" style="margin-top: 10px;">
          <thead>
            <tr>
              <th width="75%">Name</th>
              <th width="25%">Confidence</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="student in vm.students | orderBy: 'name'">
              <td>
                {{student.name}}<br />
              </td>
              <td><input type="number" class="form-control" ng-model="student.skill" /></td>
            </tr>
          </tbody>
        </table>
        <div>
          <button class="btn btn-success btn-block" ng-click="vm.generatePairs()">Generate Pairs</button>
          <button class="btn btn-success btn-block" ng-click="vm.generateRandomPairs()">Generate Random Pairs</button>
        </div>
      </div>
      <div class="col-xs-8">
        <div ng-hide="vm.pairs.length" class="alert alert-info text-center" style="margin-top: 39px;">
          What is your confidence level on a scale of 1-10? (1 being lowest, 10 being highest)
        </div>
        <div class="row">
          <div class="col-xs-6 pair" ng-repeat="pair in vm.pairs">
            {{pair.a.name}} with {{pair.b.name}}
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<script>
angular.module('app', []);

angular.module('app').controller('pairController', function($timeout) {
  var vm = this;
  
  function shuffle(array) {
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
}
  
  vm.students = [
    { name: 'Rita', skill: 2 },
    { name: 'Joe', skill: 4 },
    { name: 'Jen', skill: 5 },
    { name: 'Jim', skill: 8 },
    { name: 'Nick', skill: 5 },
    { name: 'Jason', skill: 6 },
    { name: 'Brittany', skill: 4 },
    { name: 'Colin', skill: 7 },
    { name: 'Anisha', skill: 4 }
  ];
  vm.pairs = [];
  vm.newStudent = {};
  
  vm.addStudent = function() {
    vm.students.push(vm.newStudent);
    vm.newStudent = {};
  };
  vm.generatePairs = function() {
    var studentsSorted = vm.students.sort(function(a, b) {
      return parseInt(a.skill) - parseInt(b.skill);
    });
    
    for(var i = 0; i < studentsSorted.length / 2; i++) {
      vm.pairs.push({
        a: studentsSorted[i],
        b: studentsSorted[(studentsSorted.length - 1) - i]
      });
    }
    
    for(var i = 0; i < 100; i++) {
      $timeout(function() {
         vm.pairs = shuffle(vm.pairs);         
      }, i * 100);

    }
  };
  vm.generateRandomPairs = function() {
    vm.pairs = [];
    
    var studentsShuffled = shuffle(vm.students);
    
    for(var i = 0; i < studentsShuffled.length / 2; i++) {
      vm.pairs.push({
        a: studentsShuffled[i],
        b: studentsShuffled[(studentsShuffled.length - 1) - i]
      });
    }
    
    for(var i = 0; i < 100; i++) {
      $timeout(function() {
         vm.pairs = shuffle(vm.pairs);         
      }, i * 100);

    }
  }
});
</script>

<style>
.pair {
  height: 120px; 
  font-weight: bold;
  font-size: 24px;
  text-align: center;
  padding: 24px;
  border: 1px solid black;
}
</style>