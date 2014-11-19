<?php

namespace GrowChart;

/**
 * GROW  config
 * 
 * @author Cong Peijun <p.cong@linkorb.com>
 */
class Config
{
    private static $versions = array(
        'NL2013' => array(
            'version'        => 'NL2013',
            'ethnicity'      => array(
                array(
                    'code' => 1,
                    'label' => 'Netherlands',
                    'label_cn' => '荷兰',
                    'label_nl' => 'Nederlands'
                ),
                array(
                    'code' => 2,
                    'label' => 'Other Eurpean',
                    'label_cn' => '其他欧洲',
                    'label_nl' => 'Europeïde'
                ),
                array(
                    'code' => 3,
                    'label' => 'North African',
                    'label_cn' => '北非',
                    'label_nl' => 'Noord-Afrikaans'
                ),
                array(
                    'code' => 4,
                    'label' => 'Other African',
                    'label_cn' => '其他非洲',
                    'label_nl' => 'Overig Afrikaans'
                ),
                array(
                    'code' => 5,
                    'label' => 'Turkish',
                    'label_cn' => '土耳其',
                    'label_nl' => 'Turks'
                ),
                array(
                    'code' => 6,
                    'label' => 'Indian Subcontinent',
                    'label_cn' => '印度次大陆',
                    'label_nl' => 'Zuid-Aziatisch'
                ),
                array(
                    'code' => 7,
                    'label' => 'Asian (SE, FE)',
                    'label_cn' => '亚洲 (SE, FE)',
                    'label_nl' => 'Oost- en Zuidoost-Aziatisch'
                ),
                array(
                    'code' => 8,
                    'label' => 'Asian (Nth, Cent); Middle East',
                    'label_cn' => '亚洲 (Nth, Cent); 中东',
                    'label_nl' => 'Overig Aziatisch'
                ),
                array(
                    'code' => 9,
                    'label' => 'Western (US, Aust etc)',
                    'label_cn' => '西方（美国，奥斯特等）',
                    'label_nl' => 'Overig Westers'
                ),
                array(
                    'code' => 10,
                    'label' => 'Non-Western (SAmer etc)',
                    'label_cn' => '非西方（萨默尔等）',
                    'label_nl' => 'Overig niet Westers'
                ),
                array(
                    'code' => 11,
                    'label' => 'Mixed',
                    'label_cn' => '混合',
                    'label_nl' => 'Meervoudige afkomst'
                ),
                array(
                    'code' => 12,
                    'label' => 'Other',
                    'label_cn' => '其他',
                    'label_nl' => 'Overig'
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified (defaults to Netherlands)',
                    'label_cn' => '未分类（默认为荷兰）',
                    'label_nl' => 'Onbekend'
                )
            )
        ),
        'UK2014' => array(
            'version'        => 'UK2014',
            'timezone'       => 'Europe/London',
            'ethnicity'      => array(
                array(
                    'code' => 1,
                    'label' => 'British European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 2,
                    'label' => 'East European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 3,
                    'label' => 'Irish European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 4,
                    'label' => 'North European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 5,
                    'label' => 'South European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 6,
                    'label' => 'West European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 7,
                    'label' => 'North African',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 8,
                    'label' => 'Sub-Sahara African',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 9,
                    'label' => 'Middle Eastern',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 10,
                    'label' => 'Bangladeshi',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 11,
                    'label' => 'Indian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 12,
                    'label' => 'Pakistani',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 13,
                    'label' => 'Chinese',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 14,
                    'label' => 'Other Far East',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 15,
                    'label' => 'South East Asian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 16,
                    'label' => 'Caribbean',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 17,
                    'label' => 'Mixed African-European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 18,
                    'label' => 'Mixed Asian-European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 19,
                    'label' => 'Mixed Caribbean-European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 20,
                    'label' => 'Other',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '',
                    'label_nl' => ''
                )
            )
        ),
        'NZ2014' => array(
            'version'        => 'NZ2014',
            'timezone'       => 'Pacific/Auckland',
            'ethnicity'      => array(
                array(
                    'code' => 1,
                    'label' => 'NZ European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 2,
                    'label' => 'Other European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 3,
                    'label' => 'Cook Islander',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 4,
                    'label' => 'Maori',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 5,
                    'label' => 'Fijian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 6,
                    'label' => 'Niuean',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 7,
                    'label' => 'Samoan',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 8,
                    'label' => 'Tongan',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 9,
                    'label' => 'Other Pacific Islander',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 10,
                    'label' => 'African',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 11,
                    'label' => 'Chinese',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 12,
                    'label' => 'Indian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 13,
                    'label' => 'South East Asian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 14,
                    'label' => 'Other Asian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 15,
                    'label' => 'Middle Eastern',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 16,
                    'label' => 'Latin American',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 17,
                    'label' => 'Other',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '',
                    'label_nl' => ''
                )
            )
        ),
        'UK2012' => array(
            'version'        => 'UK2012',
            'timezone'       => 'Europe/London',
            'ethnicity'      => array(
                array(
                    'code' => 1,
                    'label' => 'European',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 2,
                    'label' => 'Indian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 3,
                    'label' => 'Pakistani',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 4,
                    'label' => 'Bangladeshi',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 5,
                    'label' => 'African Caribbean',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 6,
                    'label' => 'African (Sub-Sahara)',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 7,
                    'label' => 'Middle Eastern',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 8,
                    'label' => 'Far East Asian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 9,
                    'label' => 'South East Asian',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 10,
                    'label' => 'Mixed',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 11,
                    'label' => 'Other',
                    'label_cn' => '',
                    'label_nl' => ''
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '',
                    'label_nl' => ''
                )
            )
        ),
        'NL2013B' => array(
            'version'        => 'NL2013B',
            'ethnicity'      => array(
                array(
                    'code' => 1,
                    'label' => 'Netherlands',
                    'label_cn' => '荷兰',
                    'label_nl' => 'Nederlands'
                ),
                array(
                    'code' => 2,
                    'label' => 'Other Eurpean',
                    'label_cn' => '其他欧洲',
                    'label_nl' => 'Europeïde'
                ),
                array(
                    'code' => 3,
                    'label' => 'North African',
                    'label_cn' => '北非',
                    'label_nl' => 'Noord-Afrikaans'
                ),
                array(
                    'code' => 4,
                    'label' => 'Other African',
                    'label_cn' => '其他非洲',
                    'label_nl' => 'Overig Afrikaans'
                ),
                array(
                    'code' => 5,
                    'label' => 'Turkish',
                    'label_cn' => '土耳其',
                    'label_nl' => 'Turks'
                ),
                array(
                    'code' => 6,
                    'label' => 'Indian Subcontinent',
                    'label_cn' => '印度次大陆',
                    'label_nl' => 'Zuid-Aziatisch'
                ),
                array(
                    'code' => 7,
                    'label' => 'Asian (SE, FE)',
                    'label_cn' => '亚洲 (SE, FE)',
                    'label_nl' => 'Oost- en Zuidoost-Aziatisch'
                ),
                array(
                    'code' => 8,
                    'label' => 'Asian (Nth, Cent); Middle East',
                    'label_cn' => '亚洲 (Nth, Cent); 中东',
                    'label_nl' => 'Overig Aziatisch'
                ),
                array(
                    'code' => 9,
                    'label' => 'Western (US, Aust etc)',
                    'label_cn' => '西方（美国，奥斯特等）',
                    'label_nl' => 'Overig Westers'
                ),
                array(
                    'code' => 10,
                    'label' => 'Non-Western (SAmer etc)',
                    'label_cn' => '非西方（萨默尔等）',
                    'label_nl' => 'Overig niet Westers'
                ),
                array(
                    'code' => 11,
                    'label' => 'Mixed',
                    'label_cn' => '混合',
                    'label_nl' => 'Meervoudige afkomst'
                ),
                array(
                    'code' => 12,
                    'label' => 'Other',
                    'label_cn' => '其他',
                    'label_nl' => 'Overig'
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified (defaults to Netherlands)',
                    'label_cn' => '未分类（默认为荷兰）',
                    'label_nl' => 'Onbekend'
                )
            )
        ),
        'NL2012' => array(
            'version'        => 'NL2012',
            'ethnicity'      => array(
                array(
                    'code'=> 1,
                    'label'=>'Netherlands',
                    'label_cn'=>'荷兰',
                    'label_nl'=>'Netherlands'
                ),
                array(
                    'code' => 2,
                    'label'=>'Dutch mixed',
                    'label_cn'=>'荷兰 混合',
                    'label_nl'=>'Dutch mixed'
                ),
                array(
                    'code' => 3,
                    'label'=>'Moroccan',
                    'label_cn'=>'摩洛哥',
                    'label_nl'=>'Moroccan'
                ),
                array(
                    'code' => 4,
                    'label'=>'Ghanaian',
                    'label_cn'=>'加纳',
                    'label_nl'=>'Ghanaian'
                ),
                array(
                    'code' => 5,
                    'label'=>'Surinamese-Hindustani',
                    'label_cn'=>'苏里南 - 印度斯坦',
                    'label_nl'=>'Surinamese-Hindustani'
                ),
                array(
                    'code' => 6,
                    'label'=>'Surinamese-Creole',
                    'label_cn'=>'苏里南 - 克里奥尔语',
                    'label_nl'=>'Surinamese-Creole'
                ),
                array(
                    'code' => 7,
                    'label'=>'Surinamese-Other',
                    'label_cn'=>'苏里南 - 其他',
                    'label_nl'=>'Surinamese-Other'
                )
            )
        )
    );

    public static function getVersions()
    {
        return self::$versions;
    }

    /**
     * Get the related ethnicity by grow version
     * @param string $version
     * @param string $language
     * @return array
     */
    public static function getEthnicities($version, $language = 'nl_NL')
    {
        $verions = self::$versions;
        
        if (!isset($verions[$version])) {
            $version = 'NL2013';
        }
        switch ($language) {
            case 'zh_CN':
                $label = 'label_cn';
                break;
            case 'nl_NL':
                $label = 'label_nl';
                break;
            case 'en_UK':
            default:
                $label = 'label';
                break;
        }
        $ethnicity = array();
        foreach (self::$versions[$version]['ethnicity'] as $e) {
            $ethnicity[$e['code']] = $e[$label];
        }
        return $ethnicity;
    }
}

