<?php
class ModelTotalHandling extends Model {
	public function getTotal($total) {
		if (($this->cart->getSubTotal() > $this->config->get('handling_total')) && ($this->cart->getSubTotal() > 0)) {
			$this->load->language('total/handling');

			$total['totals'][] = array(
				'code'       => 'handling',
				'title'      => $this->language->get('text_handling'),
				'value'      => $this->config->get('handling_fee'),
				'sort_order' => $this->config->get('handling_sort_order')
			);

			if ($this->config->get('handling_tax_class_id')) {
				$tax_rates = $this->tax->getRates($this->config->get('handling_fee'), $this->config->get('handling_tax_class_id'));

				foreach ($tax_rates as $tax_rate) {
					if (!isset($total['taxes'][$tax_rate['tax_rate_id']])) {
						$total['taxes'][$tax_rate['tax_rate_id']] = $tax_rate['amount'];
					} else {
						$total['taxes'][$tax_rate['tax_rate_id']] += $tax_rate['amount'];
					}
				}
			}

			$total['total'] += $this->config->get('handling_fee');
		}
	}
  
  public function getSellertotal($total) {
		if (($this->cart->getSellersubTotal($total['seller_id'] > $this->config->get('handling_total')) && ($this->cart->getSellersubTotal($total['seller_id'] > 0)) {
			$this->load->language('total/handling');

			$total['totals'][] = array(
				'code'       => 'handling',
				'title'      => $this->language->get('text_handling'),
				'value'      => $this->config->get('handling_fee'),
				'sort_order' => $this->config->get('handling_sort_order')
			);

			if ($this->config->get('handling_tax_class_id')) {
				$tax_rates = $this->tax->getRates($this->config->get('handling_fee'), $this->config->get('handling_tax_class_id'));

				foreach ($tax_rates as $tax_rate) {
					if (!isset($total['taxes'][$tax_rate['tax_rate_id']])) {
						$total['taxes'][$tax_rate['tax_rate_id']] = $tax_rate['amount'];
					} else {
						$total['taxes'][$tax_rate['tax_rate_id']] += $tax_rate['amount'];
					}
				}
			}

			$total['total'] += $this->config->get('handling_fee');
		}
	}
}