<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <?php 
            ?>
            <tbody>
                <?php if(!empty($transactions)): ?>
                    <?php $total_income = 0 ;?>
                    <?php $total_expense = 0 ;?>
                    <?php $total = 0 ;?>
                    <?php foreach($transactions as $transaction) :?> 
                        <?php $total_income += $transaction['amount'] > 0 ? $transaction['amount'] : 0 ?>
                        <?php $total_expense += $transaction['amount'] < 0 ? $transaction['amount'] : 0 ?>
                        <?php $total         += $transaction['amount']?>
                        <tr>
                            <td><?=  formatDate($transaction['date'])?></td>
                            <td><?= $transaction['check_number'] ?></td>
                            <td><?= $transaction['transaction_number'] ?></td>
                            <td style="color: <?php echo ($transaction['amount'] < 0) ? 'red' : 'green';?>;">
                                <?= formatDollarAmount($transaction['amount']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= formatDollarAmount($total_income) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= formatDollarAmount($total_expense)  ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total:</th>
                    <td><?= formatDollarAmount($total) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
