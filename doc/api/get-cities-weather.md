# GET city weather

_Get weather forecast for city_

**URL** : `/api/v3/cities/{id}/weather`

**Method** : `GET`

**Path Params** :

- id=`integer` [required] _City id_

**Query Params** :

- since=`date` [optional] (format: `YYYY-MM-DD`) _Limit minimum date range of forecast_
- to=`date` [optional] (format: `YYYY-MM-DD`) _Limit maximum date range of forecast_

**Auth required** : NO

**Permissions required** : None

## Responses

### 200 OK

_Returned when successful_

**Content** :

```json
{
  "meta": {
    "count": 2
  },
  "data": [
    {
      "date": "2010-11-05",
      "weather": "Rainy"
    },
    {
      "date": "2010-11-06",
      "weather": "Sunny"
    }
  ]
}
```

### 400 Bad Request

_Returned if url parameters contains errors_

### 404 Not Found

_Returned when city is not found_

**Content** :

```json
{
  "code": "404",
  "message": "City with id 9999 not found"
}
```

### 503 Service Unavailable

_Returned when the service is unavailable_
