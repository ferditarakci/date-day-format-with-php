# Today and next two days in text write
## Bugün ve önümüzdeki iki günü yazıyla yaz

\# 2021-12-10

<br>

```php
function dateDayFormat($today = 'today', $lang = 'en') {

}
```
<br>

### dateDayFormat()
dateDayFormat() OR dateDayFormat('today') OR dateDayFormat("2021-12-10") OR dateDayFormat("10-12-2021")
```
Output: 10, 11, 12 December 2021
```

### dateDayFormat("2021-11-30")
```
Output: 30 November and 1, 2 December 2021
```

### dateDayFormat("2021-12-30")
```
Output: 30, 31 December 2021 and 1 January 2022
```

### dateDayFormat("2021-12-31")
```
Output: 31 December 2021 and 1, 2 January 2022
```

<br>
<br>

## Türkçe olarak kullanım için

### dateDayFormat("today", "tr")
dateDayFormat("today", "tr") OR dateDayFormat("2021-12-10", "tr") OR dateDayFormat("10-12-2021", "tr")
```
Output: 10, 11, 12 Aralık 2021
```

### dateDayFormat("2021-11-30", "tr")
```
Output: 30 Kasım ve 1, 2 Aralık 2021
```

### dateDayFormat("2021-12-30", "tr")
```
Output: 30, 31 Aralık 2021 ve 1 Ocak 2022
```

### dateDayFormat("2021-12-31", "tr")
```
Output: 31 Aralık 2021 ve 1, 2 Ocak 2022
```
