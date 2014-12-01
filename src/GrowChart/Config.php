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
                    'label' => 'Asian (Nth, Cent) / Middle East',
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
                    'label_cn' => '英国欧洲',
                    'label_nl' => 'British European'
                ),
                array(
                    'code' => 2,
                    'label' => 'East European',
                    'label_cn' => '东欧',
                    'label_nl' => 'Oost-Europese'
                ),
                array(
                    'code' => 3,
                    'label' => 'Irish European',
                    'label_cn' => '爱尔兰欧洲',
                    'label_nl' => 'Ierse Europese'
                ),
                array(
                    'code' => 4,
                    'label' => 'North European',
                    'label_cn' => '北欧',
                    'label_nl' => 'Noord-Europese'
                ),
                array(
                    'code' => 5,
                    'label' => 'South European',
                    'label_cn' => '南欧',
                    'label_nl' => 'Zuid-Europese'
                ),
                array(
                    'code' => 6,
                    'label' => 'West European',
                    'label_cn' => '西欧',
                    'label_nl' => 'West-Europese'
                ),
                array(
                    'code' => 7,
                    'label' => 'North African',
                    'label_cn' => '北非',
                    'label_nl' => 'Noord-Afrikaanse'
                ),
                array(
                    'code' => 8,
                    'label' => 'Sub-Sahara African',
                    'label_cn' => '撒哈拉以南非洲地区',
                    'label_nl' => 'Sub-Sahara Afrika'
                ),
                array(
                    'code' => 9,
                    'label' => 'Middle Eastern',
                    'label_cn' => '中东',
                    'label_nl' => 'Midden-Oosten'
                ),
                array(
                    'code' => 10,
                    'label' => 'Bangladeshi',
                    'label_cn' => '孟加拉国',
                    'label_nl' => 'Bangladeshi'
                ),
                array(
                    'code' => 11,
                    'label' => 'Indian',
                    'label_cn' => '印度人',
                    'label_nl' => 'Indiase'
                ),
                array(
                    'code' => 12,
                    'label' => 'Pakistani',
                    'label_cn' => '巴基斯坦',
                    'label_nl' => 'Pakistaans'
                ),
                array(
                    'code' => 13,
                    'label' => 'Chinese',
                    'label_cn' => '中国人',
                    'label_nl' => 'Chinese'
                ),
                array(
                    'code' => 14,
                    'label' => 'Other Far East',
                    'label_cn' => '其他远东',
                    'label_nl' => 'Andere Verre Oosten'
                ),
                array(
                    'code' => 15,
                    'label' => 'South East Asian',
                    'label_cn' => '东南亚',
                    'label_nl' => 'Zuidoost-Aziatische'
                ),
                array(
                    'code' => 16,
                    'label' => 'Caribbean',
                    'label_cn' => '加勒比',
                    'label_nl' => 'Caribbean'
                ),
                array(
                    'code' => 17,
                    'label' => 'Mixed African-European',
                    'label_cn' => '混合非洲欧洲',
                    'label_nl' => 'Gemengde Afro-Europese'
                ),
                array(
                    'code' => 18,
                    'label' => 'Mixed Asian-European',
                    'label_cn' => '混合亚欧',
                    'label_nl' => 'Gemengd Aziatisch-Europese'
                ),
                array(
                    'code' => 19,
                    'label' => 'Mixed Caribbean-European',
                    'label_cn' => '混合加勒比海，欧洲',
                    'label_nl' => 'Gemengde Caribbean-Europese'
                ),
                array(
                    'code' => 20,
                    'label' => 'Other',
                    'label_cn' => '其他',
                    'label_nl' => 'Ander'
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '未分类',
                    'label_nl' => 'Geclassificeerde'
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
                    'label_cn' => 'NZ欧洲',
                    'label_nl' => 'NZ Europese'
                ),
                array(
                    'code' => 2,
                    'label' => 'Other European',
                    'label_cn' => '欧洲其他',
                    'label_nl' => 'Andere Europese'
                ),
                array(
                    'code' => 3,
                    'label' => 'Cook Islander',
                    'label_cn' => '库克群岛',
                    'label_nl' => 'Cook Islander'
                ),
                array(
                    'code' => 4,
                    'label' => 'Maori',
                    'label_cn' => '毛利',
                    'label_nl' => 'Maori'
                ),
                array(
                    'code' => 5,
                    'label' => 'Fijian',
                    'label_cn' => '斐济',
                    'label_nl' => 'fijian'
                ),
                array(
                    'code' => 6,
                    'label' => 'Niuean',
                    'label_cn' => '纽埃',
                    'label_nl' => 'Niueaans'
                ),
                array(
                    'code' => 7,
                    'label' => 'Samoan',
                    'label_cn' => '萨摩亚',
                    'label_nl' => 'Samoaanse'
                ),
                array(
                    'code' => 8,
                    'label' => 'Tongan',
                    'label_cn' => '汤加',
                    'label_nl' => 'Tongaanse'
                ),
                array(
                    'code' => 9,
                    'label' => 'Other Pacific Islander',
                    'label_cn' => '其他太平洋岛民',
                    'label_nl' => 'Andere Pacific Islander'
                ),
                array(
                    'code' => 10,
                    'label' => 'African',
                    'label_cn' => '非洲人',
                    'label_nl' => 'Afrikaanse'
                ),
                array(
                    'code' => 11,
                    'label' => 'Chinese',
                    'label_cn' => '中国人',
                    'label_nl' => 'Chinese'
                ),
                array(
                    'code' => 12,
                    'label' => 'Indian',
                    'label_cn' => '印度人',
                    'label_nl' => 'Indiase'
                ),
                array(
                    'code' => 13,
                    'label' => 'South East Asian',
                    'label_cn' => '东南亚',
                    'label_nl' => 'Zuidoost-Aziatische'
                ),
                array(
                    'code' => 14,
                    'label' => 'Other Asian',
                    'label_cn' => '其他亚洲',
                    'label_nl' => 'andere Aziatische'
                ),
                array(
                    'code' => 15,
                    'label' => 'Middle Eastern',
                    'label_cn' => '中东',
                    'label_nl' => 'Midden-Oosten'
                ),
                array(
                    'code' => 16,
                    'label' => 'Latin American',
                    'label_cn' => '拉美',
                    'label_nl' => 'Latijns-Amerikaanse'
                ),
                array(
                    'code' => 17,
                    'label' => 'Other',
                    'label_cn' => '其它',
                    'label_nl' => 'ander'
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '未分类',
                    'label_nl' => 'Geclassificeerde'
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
                    'label_cn' => '欧洲人',
                    'label_nl' => 'Europese'
                ),
                array(
                    'code' => 2,
                    'label' => 'Indian',
                    'label_cn' => '印度人',
                    'label_nl' => 'Indiase'
                ),
                array(
                    'code' => 3,
                    'label' => 'Pakistani',
                    'label_cn' => '巴基斯坦',
                    'label_nl' => 'Pakistaans'
                ),
                array(
                    'code' => 4,
                    'label' => 'Bangladeshi',
                    'label_cn' => '孟加拉国',
                    'label_nl' => 'Bangladeshi'
                ),
                array(
                    'code' => 5,
                    'label' => 'African Caribbean',
                    'label_cn' => '非洲，加勒比',
                    'label_nl' => 'Afro Caribbean'
                ),
                array(
                    'code' => 6,
                    'label' => 'African (Sub-Sahara)',
                    'label_cn' => '非洲（撒哈拉以南）',
                    'label_nl' => 'Afrikaanse (Sub-Sahara)'
                ),
                array(
                    'code' => 7,
                    'label' => 'Middle Eastern',
                    'label_cn' => '中东',
                    'label_nl' => 'Midden-Oosten'
                ),
                array(
                    'code' => 8,
                    'label' => 'Far East Asian',
                    'label_cn' => '远东亚洲',
                    'label_nl' => 'Far East Asian'
                ),
                array(
                    'code' => 9,
                    'label' => 'South East Asian',
                    'label_cn' => '东南亚',
                    'label_nl' => 'Zuidoost-Aziatische'
                ),
                array(
                    'code' => 10,
                    'label' => 'Mixed',
                    'label_cn' => '混合',
                    'label_nl' => 'gemengd'
                ),
                array(
                    'code' => 11,
                    'label' => 'Other',
                    'label_cn' => '其他',
                    'label_nl' => 'ander'
                ),
                array(
                    'code' => 'UNK',
                    'label' => 'Unclassified',
                    'label_cn' => '未分类',
                    'label_nl' => 'Geclassificeerde'
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
    public static function getEthnicities($version, $language = 'en_UK')
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

