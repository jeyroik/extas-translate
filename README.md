# extas-translate

Пакет для организации переводов на разные языки.

Также может использоваться для "упаковки сообщений" (см. примеры ниже).

# Установка

`compose require jeyroik/extas-translate:*`

# Использование

## Предустановка переводов

Настройка в extas-совместимой конфигурации:

```json
{
  "translates": [
    {
      "lang_source": "en",
      "lang_translated": "ru",
      "source": "Access denied",
      "translated": "Доступ запрещён",
      "type": "danger"
    }
  ]
}
```

## Установка предустановленных переводов

`/vendor/bin/extas i`

## Упаковка сообщений

```php
use extas\components\translates\helpers\Error;

echo Error::make('Access denied', 'ru'); // что-то вроде "jdhJPdg4b22nd945Nbb"
```

## Распаковка сообщений (перевод)

```php
use extas\components\translates\TranslateCoder;

$coder = new TranslateCoder();
echo $coder->translate('jdhJPdg4b22nd945Nbb')->getText(); // "Доступ запрещён"
```