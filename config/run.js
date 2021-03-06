(function() {
    "use strict";
    var appRun;
    appRun = function($rootScope, $state, $document, $stateParams) {
        $rootScope.$state = $state;
        $rootScope.$stateParams = $stateParams;
        $rootScope.$on('$viewContentLoaded', function(event) {
            $rootScope.isLoading = false;
            $('.bootstrap-select').selectpicker();
            
        });
        $rootScope.$on('$stateChangeStart', function(event) {
            $rootScope.isLoading = true;
        });
        $rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
            $rootScope.isLoading = false;
            var states = ['home','how-it-works','our-team','about-us','contact-us','faq','terms-of-service','privacy-policy','projects','services'];
            $document[0].body.scrollTop = $document[0].documentElement.scrollTop = 0;
            $rootScope.hideHeaderFooter = (states.indexOf(toState.name) > -1) ? true : false;

        });

    }
    angular.module('p2lApp').run(['$rootScope', '$state', '$document', '$stateParams', appRun]);
})();