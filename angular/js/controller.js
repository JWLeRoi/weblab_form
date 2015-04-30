var userApp = angular.module('userApp', []);



userApp.controller('UserAppCtrl', function ($scope) {

  $scope.users = [

  {
    'name'   : 'David',
    'address': '222 W Main Street, Longmont, CO',
    'phone'  : '303-123-4567'
  },
  {
    'name'   : 'Bob',
    'address': '11 Wall Street New York, NY.',
    'phone'  : '555-555-1212'
  },
  {
    'name'   : 'Jerry',
    'address': '2190 Miller Dr, Longmont, CO 80501',
    'phone'  : '970-555-1212'
  }
];


  alert(jQuery("#something").html());


});
