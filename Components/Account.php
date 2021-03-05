<?php


    namespace Components;


    use Exception;

    class Account
    {
        private float $balance = 0.0;

        public function withDraw(float $amount): bool
        {
            if ($this->balance === 0.0) {
                throw new Exception("Balance = 0");
            }
            $this->balance -= $amount;

            return true;
        }
    }
