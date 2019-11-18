<?php
if ( ! class_exists( 'newsmax_ruby_schema' ) ) {
	class newsmax_ruby_schema {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $context
		 * @param $echo
		 *
		 * @return bool|string
		 * schema markup
		 */
		static function markup( $context ) {

			$str  = '';
			$data = array();
			$protocol = 'http';

			if ( is_ssl() ) {
				$protocol = 'https';
			}

			switch ( $context ) {
				case 'body' :
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/WebPage';
					break;

				case 'article' :
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/Article';
					break;

				case 'review' :
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/Review';
					break;

				case 'menu':
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/SiteNavigationElement';
					break;

				case 'header':
					$data['role']      = 'banner';
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/WPHeader';
					break;

				case 'sidebar':
					$data['role']      = 'complementary';
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/WPSideBar';
					break;

				case 'footer':
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/WPFooter';
					break;

				case 'logo' :
					$data['itemscope'] = true;
					$data['itemtype']  = $protocol . '://schema.org/Organization';
					break;
			};

			if ( empty( $data ) ) {
				return false;
			}

			foreach ( $data as $k => $v ) {
				if ( true === $v ) {
					$str .= ' ' . $k . ' ';
				} else {
					$str .= ' ' . $k . '="' . $v . '" ';
				}
			}

			//check & return
			return $str;
		}
	}
}