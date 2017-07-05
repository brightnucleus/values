# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

## [0.2.0] - 2017-07-05
### Added
- Added unit tests.

### Changed
- Changed validation signature to fit `brightnucleus/validation` package.
- Adapted implementations to match change in signature. Failed validations now throw an exception instead of returning `null`.
- Changed signature for named constructors of the `FailedToValidate` and `FailedToSanitize` exceptions.

## [0.1.1] - 2017-03-27
### Added
- Add validation.
- Add sanitization.
- Add optional flags.

### Changed
- Remove `composer.lock` file.

## [0.1.0] - 2017-02-07
### Added
- Initial release to GitHub.

[0.2.0]: https://github.com/brightnucleus/values/compare/v0.1.1...v0.2.0
[0.1.1]: https://github.com/brightnucleus/values/compare/v0.1.0...v0.1.1
[0.1.0]: https://github.com/brightnucleus/values/compare/v0.0.0...v0.1.0
