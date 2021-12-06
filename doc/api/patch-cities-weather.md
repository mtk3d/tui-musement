# PATCH city weather

_Update weather forecast for city_

**URL** : `/api/v3/cities/{id}/weather`

**Method** : `PATCH`

**Path Params** :

- id=`integer` [required] _City id_

**Auth required** : YES

**Permissions required** : Admin

**Payload** :
```json
[
  {
    "date": "2010-11-05",
    "weather": "Rainy"
  },
  {
    "date": "2010-11-06",
    "weather": "Sunny"
  }
]
```

## Responses

### 204 No Content

_Returned when successful_

**Content** :

```json
{
  "code": "204",
  "message": "Weather updated successfully"
}
```

### 400 Bad Request

_Returned if sent data contains errors_

### 401 Unauthorized

_Returned when authorization fails_

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
