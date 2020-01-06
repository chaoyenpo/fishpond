# Gamesmkt\Fishpond

Fishpond is a playground abstraction.

## Installation

```
composer require gamesmkt/fishpond
```

## 建立一個 Adapter

### 什麼是 Adapter

Adapter 可以被當作一個插頭 - 彌補原先不相容的 API 之間的差距。Adapter 的工作是將 request 轉換為遊戲廠商可以理解的調用，並重新格式化 response 以符合通用遊戲廠商的 interface。

切勿直接使用 Adapter，僅應將其用於創建`Gamesmkt\Fishpond\FishpondInterface`。

### 實現 Main interface

Adapter 需要實現 `Gamesmkt\Fishpond\AdapterInterface`。這個 interface 指示需要實現的 all methods。Adapter 的 interface 類似於 `Gamesmkt\Fishpond\FishpondInterface`，method names 相同，但 response 通常不同。

Adapter 的 response 通常是包含 requested value 的 array。因為 call 遊戲廠商返回的值通常比 client 最初 requested 的要多。
