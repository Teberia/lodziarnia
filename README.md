
#  Frosty Manager

Frosty Manager to system informatyczny wspomagający zarządzanie lodziarnią. Aplikacja umożliwia zarządzanie użytkownikami, magazynem smaków lodowych, zamówieniami oraz kontrolę dostępu opartą o role użytkowników.

Projekt został zrealizowany w ramach przedmiotu Projektowanie Systemu.

## Autorzy

* Elżbieta Bała
* Jakub Bartos
* Rafał Jaroński


## Technologie

### Backend

* PHP 8
* Smarty
* Medoo

### Frontend

* Bootstrap 5

### Baza danych

* MySQL 8

### DevOps

* Docker
* Docker Compose
* Terraform
* GitHub Actions
* AWS EC2


## Uruchomienie lokalne

### Wymagania

* Docker
* Docker Compose

### Instalacja

```bash
git clone https://github.com/Teberia/lodziarnia.git

cd lodziarnia

docker compose up -d
```

Po uruchomieniu aplikacja będzie dostępna pod adresem:

```
http://localhost:3000
```

## Deployment

Infrastruktura środowiska produkcyjnego tworzona jest przy użyciu Terraform.

Przykładowe uruchomienie:

```bash
terraform init
terraform apply
```

Aplikacja wdrażana jest na instancję AWS EC2.




## Repozytorium

https://github.com/Teberia/lodziarnia


```
