# Constellation crawler 星座網站爬蟲（Laravel）

爬蟲目標網站：https://astro.click108.com.tw/

目標：當日的十二星座資料以爬蟲方式抓取,並在解析後儲存至資料庫內
所需儲存的必要資料如下列
● 當天日期
● 星座名稱
● 整體運勢的評分及說明
● 愛情運勢的評分及說明
● 事業運勢的評分及說明
● 財運運勢的評分及說明

使用 laravle schedule 每日爬取資料，並存在資料庫

## Use

-   顯示資料庫內容

    method:GET
    url:https://constellation.gill.gq/showTodayLuck

-   立刻執行爬重並顯示資料

    method:GET
    url:https://constellation.gill.gq/crawler

### 瀏覽器執行結果

![](https://i.imgur.com/48hYi10.png)
