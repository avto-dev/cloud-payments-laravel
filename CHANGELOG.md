# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog][keepachangelog] and this project adheres to [Semantic Versioning][semver].

## Unreleased

### Added

- Request builders for working with `SBP`

## v1.5.0

### Changed

- Minimal require PHP version now is `8.0`
- Package `guzzlehttp/psr7` up to `^2.4`
- Minimal `phpstan/phpstan` version now is `1.8`
- Version of `composer` in docker container updated up to `2.5.3`

## v1.4.0

### Added

- Reference `SubscriptionStatus` with subscription statuses

## v1.3.0

### Removed

- Dependency `tarampampam/wrappers-php` because this package was deprecated and removed

### Changed

- Minimal require PHP version now is `7.3`
- Package `tarampampam/guzzle-url-mock` replaced with `avto-dev/guzzle-url-mock` version `^1.5`

## v1.2.0

### Added

- Support PHP `8.x`

### Changed

- Composer `2.x` is supported now
- Package `fzaninotto/faker` replaced with `fakerphp/faker` version `^1.12`

## v1.1.0

### Changed

- Laravel 8 is supported
- Minimal Laravel version now is `6.0` (Laravel `5.5` LTS got last security update August 30th, 2020)
- Guzzle 7 (`guzzlehttp/guzzle`) is supported
- Dependency `tarampampam/wrappers-php` version `~2.0` is supported

## v1.0.1

### Fixed

- Package version of `guzzlehttp/guzzle` from `~6.4.1` to `~6.1` [#10]

[#10]:https://github.com/avto-dev/cloud-payments-laravel/issues/10

## v1.0.0

### Changed

- Maximal `illuminate/*` packages version now is `7.*`
- CI completely moved from "Travis CI" to "Github Actions" _(travis builds disabled)_

## v0.1.0

### Fixed

- Remove json encoding from `CustomerReceipt` field in `SubscriptionsCreateRequestBuilder` and `SubscriptionsUpdateRequestBuilder` ([#7])

[#7]: https://github.com/avto-dev/cloud-payments-laravel/issues/7

## v0.0.2

### Changed

- This package was recreated

### Removed

- Removed getters [#2]

## v0.0.1

### Changed

- This package was created

[keepachangelog]:https://keepachangelog.com/en/1.0.0/
[semver]:https://semver.org/spec/v2.0.0.html
[#2]:https://github.com/avto-dev/cloud-payments-laravel/issues/2
