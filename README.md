# Convert

Convert metrics from one form to another.

<p align="center">
  <a href="https://travis-ci.org/clarkeash/converter">
    <img src="https://img.shields.io/travis/clarkeash/converter.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/clarkeash/converter/code-structure/master/code-coverage">
    <img src="https://img.shields.io/scrutinizer/coverage/g/clarkeash/converter.svg?style=flat-square">
  </a>
  <a href="https://scrutinizer-ci.com/g/clarkeash/converter">
    <img src="https://img.shields.io/scrutinizer/g/clarkeash/converter.svg?style=flat-square">
  </a>
  <a href="https://github.com/clarkeash/converter/blob/master/LICENSE">
    <img src="https://img.shields.io/github/license/clarkeash/converter.svg?style=flat-square">
  </a>
  <a href="https://twitter.com/clarkeash">
    <img src="http://img.shields.io/badge/author-@clarkeash-blue.svg?style=flat-square">
  </a>
</p>

## Usage

### Convert Memory Sizes

```php
Convert::size()->from(500)->megabytes()->to()->gigabytes(); // 0.5
Convert::size()->from(2)->mebibytes()->to()->bytes(); // 2097152
```

See the [Size class](https://github.com/clarkeash/converter/blob/master/src/Metrics/Size.php) to see all the available conversion methods.
