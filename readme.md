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

---

## wp-env（開発者向け）

一応 .wp-env.json が置いてあります。

Docker が動作している状態で、

### wp-env をインストール

```
npm -g i @wordpress/env
```

### wp-env を起動

 ```
 wp-env start
 ```

詳しくは下記を参照ください。

https://ja.wordpress.org/team/handbook/block-editor/reference-guides/packages/packages-env/

---

## PHPUnit test（開発者向け）

```
composer install
wp-env start
npm run phpunit
```

※ ディレクトリ名・ファイル名を変更した場合は package.json 及び tests/bootstrap.php にディレクトリ名・ファイル名の記述があるので変更してください。

## Dist （開発者向け）

以下のコマンドで dist/lightning-child-sample/ に node_modules を覗いたファイルが複製されます。 

```
npm run dist
```

出力先のフォルダ名を変更したい場合は package.json の dist/lightning-child-sample/ の記述を変更してください。
