<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Packages' "active" column value
		$appUrl = env('APP_URL');
		$isDemoDomain = (isDemoDomain($appUrl) || str_contains($appUrl, 'bedigit.local') || str_contains($appUrl, 'laraclassifier.local'));
		$activeValue = $isDemoDomain ? '1' : '0';
		
		$entries = [
			[
				'name'                  => [
					'en' => 'Regular List',
					'fr' => 'Gratuit',
					'es' => 'Lista regular',
					'ar' => 'قائمة منتظمة',
					'pt' => 'Lista Regular',
					'ru' => 'Обычный список',
					'tr' => 'Normal Liste',
					'th' => 'รายการปกติ',
					'ka' => 'რეგულარული სია',
					'zh' => '常规清单',
					'ja' => 'レギュラーリスト',
					'it' => 'Elenco regolare',
					'ro' => 'Lista regulată',
					'de' => 'Regelmäßige Liste',
					'hi' => 'नियमित सूची',
					'bn' => 'নিয়মিত তালিকা',
				],
				'short_name'            => [
					'en' => 'Free',
					'fr' => 'Standard',
					'es' => 'Estándar',
					'ar' => 'اساسي',
					'pt' => 'Padrão',
					'ru' => 'Стандарт',
					'tr' => 'Standart',
					'th' => 'มาตรฐาน',
					'ka' => 'სტანდარტული',
					'zh' => '标准',
					'ja' => '標準',
					'it' => 'Standard',
					'ro' => 'Standard',
					'de' => 'Standard',
					'hi' => 'नि: शुल्क',
					'bn' => 'মুক্ত',
				],
				'ribbon'                => 'red',
				'has_badge'             => '1',
				'price'                 => '0.00',
				'currency_code'         => 'USD',
				'promo_duration'        => null,
				'duration'              => null,
				'pictures_limit'        => null,
				'description'           => null,
				'facebook_ads_duration' => '0',
				'google_ads_duration'   => '0',
				'twitter_ads_duration'  => '0',
				'linkedin_ads_duration' => '0',
				'recommended'           => '0',
				'parent_id'             => null,
				'lft'                   => '2',
				'rgt'                   => '3',
				'depth'                 => '0',
				'active'                => $activeValue,
			],
			[
				'name'                  => [
					'en' => 'Top page Listing',
					'fr' => 'Annonce Haut de Page',
					'es' => 'Anuncio de inicio de página',
					'ar' => 'إعلان أعلى الصفحة',
					'pt' => 'Anúncio no topo da página',
					'ru' => 'Объявление вверху страницы',
					'tr' => 'Sayfa Başı Duyuru',
					'th' => 'ประกาศด้านบนของหน้า',
					'ka' => 'გვერდის განცხადება',
					'zh' => '页首公告',
					'ja' => 'ページのトップへ',
					'it' => 'Annuncio in cima alla pagina',
					'ro' => 'Anunț de primă pagină',
					'de' => 'Top-Seite Anzeige',
					'hi' => 'शीर्ष पृष्ठ लिस्टिंग',
					'bn' => 'শীর্ষ পৃষ্ঠার তালিকা',
				],
				'short_name'            => [
					'en' => 'Premium',
					'fr' => 'Premium',
					'es' => 'Prima',
					'ar' => 'الممتازة',
					'pt' => 'Prêmio',
					'ru' => 'Премиум',
					'tr' => 'Ödül',
					'th' => 'พรีเมียม',
					'ka' => 'პრემია',
					'zh' => '保费',
					'ja' => 'プレミアム',
					'it' => 'Premium',
					'ro' => 'Premium',
					'de' => 'Prämie',
					'hi' => 'अधिमूल्य',
					'bn' => 'প্রিমিয়াম',
				],
				'ribbon'                => 'orange',
				'has_badge'             => '1',
				'price'                 => '7.50',
				'currency_code'         => 'USD',
				'promo_duration'        => '7',
				'duration'              => '60',
				'pictures_limit'        => '10',
				'description'           => [
					'en' => "Featured on the homepage\nFeatured in the category",
					'fr' => "En vedette à l'accueil\nEn vedette dans la catégorie",
					'es' => "Destacado en la página de inicio\nDestacado en la categoría",
					'ar' => "ظهرت على الصفحة الرئيسية\nظهرت في الفئة",
					'pt' => "Apresentado na página inicial\nApresentado na categoria",
					'ru' => "Показано на главной странице\nВ категории",
					'tr' => "Ana Sayfada Öne Çıkanlar\nKategoride Öne Çıkanlar",
					'th' => "นำเสนอในหน้าแรก\nนำเสนอในหมวดหมู่",
					'ka' => "მთავარ გვერდზე\nმთავარი კატეგორიაში",
					'zh' => "精选在首页上\n列入类别",
					'ja' => "ホームページに掲載\nカテゴリーで紹介",
					'it' => "In primo piano sulla home page\nIn primo piano nella categoria",
					'ro' => "Prezentat pe pagina de pornire\nPrezentat în categorie",
					'de' => "Auf der Homepage vorgestellt\nGekennzeichnet in der Kategorie",
					'hi' => "मुखपृष्ठ पर विशेष रुप से प्रदर्शित\nश्रेणी में विशेष रुप से प्रदर्शित",
					'bn' => "হোমপেজে বৈশিষ্ট্যযুক্ত\nবিষয়শ্রেণীতে বৈশিষ্ট্যযুক্ত",
				],
				'facebook_ads_duration' => '0',
				'google_ads_duration'   => '0',
				'twitter_ads_duration'  => '0',
				'linkedin_ads_duration' => '0',
				'recommended'           => '1',
				'parent_id'             => null,
				'lft'                   => '4',
				'rgt'                   => '5',
				'depth'                 => '0',
				'active'                => $activeValue,
			],
			[
				'name'                  => [
					'en' => 'Top page Ad+',
					'fr' => 'Annonce Haut de Page+',
					'es' => 'Anuncio de inicio de página+',
					'ar' => 'إعلان أعلى الصفحة+',
					'pt' => 'Anúncio no topo da página+',
					'ru' => 'Объявление вверху страницы+',
					'tr' => 'Sayfa Başı Duyuru+',
					'th' => 'ประกาศด้านบนของหน้า+',
					'ka' => 'გვერდის განცხადება+',
					'zh' => '页首公告+',
					'ja' => 'ページのトップへ+',
					'it' => 'Annuncio in cima alla pagina+',
					'ro' => 'Anunț de primă pagină+',
					'de' => 'Top-Seite Anzeige+',
					'hi' => 'शीर्ष पृष्ठ विज्ञापन+',
					'bn' => 'শীর্ষ পৃষ্ঠার বিজ্ঞাপন+',
				],
				'short_name'            => [
					'en' => 'Premium+',
					'fr' => 'Premium+',
					'es' => 'Prima+',
					'ar' => 'الممتازة+',
					'pt' => 'Prêmio+',
					'ru' => 'Премиум+',
					'tr' => 'Ödül+',
					'th' => 'พรีเมียม+',
					'ka' => 'პრემია+',
					'zh' => '保费+',
					'ja' => 'プレミアム+',
					'it' => 'Premium+',
					'ro' => 'Premium+',
					'de' => 'Prämie+',
					'hi' => 'प्रीमियम+',
					'bn' => 'প্রিমিয়াম+',
				],
				'ribbon'                => 'green',
				'has_badge'             => '1',
				'price'                 => '9.00',
				'currency_code'         => 'USD',
				'promo_duration'        => '30',
				'duration'              => '120',
				'pictures_limit'        => '15',
				'description'           => [
					'en' => "Featured on the homepage\nFeatured in the category",
					'fr' => "En vedette à l\'accueil\nEn vedette dans la catégorie",
					'es' => "Destacado en la página de inicio\nDestacado en la categoría",
					'ar' => "ظهرت على الصفحة الرئيسية\nظهرت في الفئة",
					'pt' => "Apresentado na página inicial\nApresentado na categoria",
					'ru' => "Показано на главной странице\nВ категории",
					'tr' => "Ana Sayfada Öne Çıkanlar\nKategoride Öne Çıkanlar",
					'th' => "นำเสนอในหน้าแรก\nนำเสนอในหมวดหมู่",
					'ka' => "მთავარ გვერდზე\nმთავარი კატეგორიაში",
					'zh' => "精选在首页上\n列入类别",
					'ja' => "ホームページに掲載\nカテゴリーで紹介",
					'it' => "In primo piano sulla home page\nIn primo piano nella categoria",
					'ro' => "Prezentat pe pagina de pornire\nPrezentat în categorie",
					'de' => "Auf der Homepage vorgestellt\nGekennzeichnet in der Kategorie",
					'hi' => "मुखपृष्ठ पर विशेष रुप से प्रदर्शित\nश्रेणी में विशेष रुप से प्रदर्शित",
					'bn' => "হোমপেজে বৈশিষ্ট্যযুক্ত\nবিষয়শ্রেণীতে বৈশিষ্ট্যযুক্ত",
				],
				'facebook_ads_duration' => '0',
				'google_ads_duration'   => '0',
				'twitter_ads_duration'  => '0',
				'linkedin_ads_duration' => '0',
				'recommended'           => '0',
				'parent_id'             => null,
				'lft'                   => '6',
				'rgt'                   => '7',
				'depth'                 => '0',
				'active'                => $activeValue,
			],
		];
		
		$tableName = (new Package())->getTable();
		foreach ($entries as $entry) {
			$entry = arrayTranslationsToJson($entry);
			$entryId = DB::table($tableName)->insertGetId($entry);
		}
	}
}
