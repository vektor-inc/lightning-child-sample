# Lightning G3 子テーマサンプル

カスタマイズの方法については以下で順次公開しています

https://training.vektor-inc.co.jp/courses/lightning-customize/

## CSSのビルド

※ 普段からsassのコンパイルをしている人向けの説明です

パッケージのインストール

```
npm install
```

assets/_scss/ ディレクトリの監視・コンパイル

```
npm run watch
```


## PHPUnit test（開発者向け）

```
composer install
wp-env start
npm run phpunit
```

※ ディレクトリ名・ファイル名を変更した場合は package.json 及び tests/bootstrap.php にディレクトリ名・ファイル名の記述があるので変更してください。