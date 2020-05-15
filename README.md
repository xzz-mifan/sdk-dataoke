# 大淘客(DaTaoKe)SDK

### 简介
快速优雅的大淘客SDK,从未如此无与伦比

The fast and elegant Dataoke SDK has never been so unbeatable

一个用于大淘客API调用的优秀SDK

An excellent SDK for API calls of Dataoke

![avatar](https://raw.githubusercontent.com/xzz-mifan/sdk-dataoke/master/img/1.png)

![avatar](https://raw.githubusercontent.com/xzz-mifan/sdk-dataoke/master/img/2.png)

![avatar](https://raw.githubusercontent.com/xzz-mifan/sdk-dataoke/master/img/3.png)

### 下载 of 安装

> Composer

```
composer require xzz-mifan/dataoke
```

> GIT

```
git clone https://github.com/xzz-mifan/sdk-dataoke.git
```

> 普通

```
https://github.com/xzz-mifan/sdk-dataoke.git
```

### 使用教程

> 默认配置
>
```
Config.php \DTK\Config
static $default = [
    'appKey'         => 'xxxxx', // 默认大淘客appKey
    'appSecret'      => 'xxxxx', // 默认大淘客appSecret
    'cacheDirectory' => './temp/DOFileCacheStorage/', // 缓存默认路径 需要自己配置
    'cachetime'      => 300, // 默认缓存时间
];
```

> 使用实例

```
use DTK\request\basic\PrivilegeLinkReq;
use DTK\request\original\TbTopicListReq;
use DTK\request\search\SuggestionReq;


$client = new \DTK\Client();

/* 入库更新API-商品列表 */
$goodsListReq = new DTK\request\save\GoodsListReq();
$goodsListReq->setPageId(1);

// 第一种
$result = DTK\client\Save::static()->getGoodsList($goodsListReq);
var_dump($result);

// 第二种
$result = $client->getGoodsList($goodsListReq);
var_dump($result);

/* 基础功能API-高效转链 */
$privilegeLinkReq = new PrivilegeLinkReq();
$privilegeLinkReq->setGoodsId('607454770461');

// 第一种
$result = \DTK\client\Basic::static()->getPrivilegeLink($privilegeLinkReq);
var_dump($result);

// 第二种
$result = $client->getPrivilegeLink($privilegeLinkReq);
var_dump($result);

/* 搜索相关API-联想词 */
$suggestionReq = new SuggestionReq();
$suggestionReq->setKeyWords('洗衣');
$suggestionReq->setType(1);

// 第一种
$result = \DTK\client\Search::static()->getSuggestion($suggestionReq);
var_dump($result);

// 第二种
$result = $client->getSuggestion($suggestionReq);
var_dump($result);

/* 特色栏目API-官方活动推广 */
$tbTopicListReq = new TbTopicListReq();
$tbTopicListReq->setPageId(1);

// 第一种
$result         = \DTK\client\Original::static()->getTbTopicList($tbTopicListReq);
var_dump($result);

// 第二种
$result = $client->getTbTopicList($tbTopicListReq);
var_dump($result);

```