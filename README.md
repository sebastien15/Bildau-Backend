# Bildau-Backend
  

This application creates bildau challenge apis for get reports, solve reports and block reports


## Installation


Git clone this repo

```

# no special installation required.
# check if php is installed using php -v preferably php7.4
# in your root folder run php -S localhost:8000 to start application

```

## 


## Usage and apis


Git clone this repo

```

# GET ALL REPORTS: localhost:8000/reports, METHOD: GET
# SOLVE REPORTS: localhost:8000/reports/:reportId , METHOD: PUT 
# pass json body format of { "state":"CLOSED" }
# BLOCK REPORTS: localhost:8000/reports/:reportId  , METHOD: DELETE
