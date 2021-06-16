# www.webportfolio.pl

## Zadanie główne

+ zarządzanie domenami poprzez wpisy DNS
  + poprzez przypisanie nameserver do webportfolio.pl

+ monitorowanie domen
+ alerty bezpieczeństwa
+ wykrywanie reguł i informowanie o zdarzeniach

## Możliwa automatyzacja zadań:
+ warunki, jeśli zostanie wykryta jakaś reguła w zalezności od awartości:
  + domena
    + provider
    + whois
    + transfer
    + email
    + dane, privacy
  + server
    + restart
  + wpis DNS
    + white, blacklist
  + dostępność

# TODO:

split php files to another projects for apifunc:

+ php.webportfolio.pl
  
split JS files:

+ js.webportfolio.pl


### TODO:
+ czat do kontaktu z klientami, jesli są jakieś problemy
+ informations about it, faq, video example,
+ application deployment
+ make project only for php files to import them from php.webportfolio.pl
    + attribute
    + model
    + command
    + query
    + event

+ only request and response are local, rest code is reusable

+ hurtowa zmiana:
    + DNS
    + recordy
    
+ hurtowy transfer od różnych registrarów


### deploy

+ .apifunc as a cloud service, build functionality in the fly, deploy it + hash + cname
    + monitoring, check sourcode, cache it
www.cloud.apifunc.com
    username.cloud.apifunc.com
        php.apifunc.com
      
+ Oferta 1 abo, vps for deploy -> softreck.cloud
  



## Contribution

+ request - REST/POST/GET
    + query - Read
        + event create
        
    + command - Create Update Delete
        + event create
        + event use
      
    + model
        + attribute
    
    

# First Steps with .apicra

## on linux

### install
    sh .apicra/install

### open in browser
    sh .apicra/browser

## on windows

### install
    .apibuild\\install.bat

### build
    .apifunc\\download.bat
    .apifunc\\delete.bat

### start
    .apiexec\\start.bat

### open in browser
    .apicra\\browser.bat





---
+ [edit](https://github.com/webportfolio-pl/www/edit/main/README.md)

```
https://github.com/webportfolio-pl/www.git
```
