<div id="stock_table" class="container">

    <?php
    $stockList = $this->fetchStockTable($data['item_title'], $data['minor']);
    ?>

    <?php if ($stockList == "offline") : ?>
        <h3>The Stock List is Offline</h3>
    <?php else : ?>

        <?php
        $matchCount = 0;
        foreach ($stockList as $stockItem) :
            if ($data['item_title'] == $stockItem[1]) {
                $matchCount++;
            }
        endforeach;

        if ($matchCount == 0) {
            $matchDisplay = "There are no exact matches in stock,</br>";
        } else {
            $matchDisplay = "There are " . $matchCount .  " matches in stock,</br>";
        }

        if (count($stockList) != 0) {
            if ($matchCount == 0) {
                $matchDisplay .= "but ";
            } else {
                $matchDisplay .= "and ";
            }
            $matchDisplay .= "there are " . count($stockList) - $matchCount . " similar items in stock.";
        } else {
            if ($matchCount == 0) {
                $matchDisplay .= "and ";
            } else {
                $matchDisplay .= "but ";
            }
            $matchDisplay .= "there are no similar items in stock.";
        }
        ?>

        <h3 class="mt-4"><?php echo $matchDisplay; ?></h3>

        <table class="table align-middle mb-0 bg-white col border">
            <thead class="bg-light">
                <tr>
                    <th class="col-2">sku</th>
                    <th class="col-3">descripton</th>
                    <th class="col-1">location</th>
                    <th class="col-2 text-center">retail price</th>
                    <th class="col-3 text-center">date</th>
                    <th class="col-1">minor</th>
                </tr>

            </thead>
            <tbody><?php foreach ($stockList as $stockItem) : ?>
                    <tr>
                        <td><?php echo $stockItem[0]; ?></td>
                        <td>
                            <p class="fw-bold mb-1"><?php echo $stockItem[1]; ?></p>
                        </td>
                        <td class="text-center">
                            <?php
                            switch ($stockItem[2]) {
                                case '01':
                                    $locationFlag = "table-primary";
                                    break;
                                case '02':
                                    $locationFlag = "table-success";
                                    break;
                                case '08':
                                    $locationFlag = "table-danger";
                                    break;
                                default:
                                    $locationFlag = "table-warning";
                                    break;
                            }
                            ?>
                            <p class="fw-bold <?php echo $locationFlag; ?> rounded mb-1"> <?php echo $stockItem[2]; ?></p>
                        </td>
                        <td class="text-center">
                            <p class="fw-bold table-dark rounded mb-1">
                                <?php echo $stockItem[3]; ?></p>
                        </td>
                        <td class="text-center">
                            <p class="fw-normal mb-1"><?php echo $stockItem[4]; ?></p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?php echo $stockItem[5]; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>
</div>
<br />
<br />
<br />