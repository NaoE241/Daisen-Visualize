# Daisen-Visualize

## 各ファイルの機能

| File | Function |
|------|-------|
|receive.php | pushされたJSON形式データの読み込みと,そのデータをDBにinsertする. |
|index.php | DBからすべてのデータを連想配列で受け取り,Web上に出力する. |

## DBの仕様
DBは以下の形式のTableをもつ.
| Field | Type | Null | Key | Default | Extra |
|------|-----|-----|-----|------|------|
|sensor_id|varchar(10)|YES| |NULL| |
|point|varchar(10)|YES| |NULL| |
|timestamp|varchar(30)|YES| |NULL| |
|count1|int|YES| |NULL| |
|count2|int|YES| |NULL| |
