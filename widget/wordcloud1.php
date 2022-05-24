<html lang="zh">
<head>
    <meta charset="utf-8">
    <title>兴趣词云</title>
</head>

<body>
    <div id="wordcloud_interests"></div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts-en.common.min.js"></script>

<script>
    // 图表主题配置文件，codepen 中引用
    // https://codepen.io/thirtyjin/pen/Epxxoe
    // 图表公共变量文件，codepen 中引用
    // https://codepen.io/thirtyjin/pen/OwJJON

    //
    //
    // wordcloud chart
    //

    if (document.getElementById('wordcloud_interests')) {

        var keywords = [{
                name: "大众",
                value: 3003
            },
            {
                name: "丰田",
                value: 452
            },
            {
                name: "本田",
                value: 224
            },
            {
                name: "奔驰",
                value: 3293
            },
            {
                name: "宝马",
                value: 349
            },
            {
                name: "奥迪",
                value: 734
            },
            {
                name: "福特",
                value: 4123
            },
            {
                name: "日产",
                value: 232
            },
            {
                name: "别克",
                value: 907
            },
            {
                name: "吉利",
                value: 3186
            },
            {
                name: "现代",
                value: 563
            },
            {
                name: "宝骏",
                value: 1291
            },
            {
                name: "雪佛兰",
                value: 41
            },
            {
                name: "比亚迪",
                value: 763
            },
            {
                name: "长安",
                value: 1274
            },
            {
                name: "马自达",
                value: 830
            },
            {
                name: "起亚",
                value: 366
            },
            {
                name: "JEEP",
                value: 480
            },
            {
                name: "哈弗",
                value: 1121
            },
            {
                name: "北汽绅宝",
                value: 404
            },
            {
                name: "雷克萨斯",
                value: 879
            },
            {
                name: "奇瑞",
                value: 232
            },
            {
                name: "保时捷",
                value: 164
            },
            {
                name: "沃尔沃",
                value: 270
            },
            {
                name: "凯迪拉克",
                value: 652
            },
            {
                name: "路虎",
                value: 862
            },
            {
                name: "铃木",
                value: 68
            },
            {
                name: "三菱",
                value: 641
            },
            {
                name: "特斯拉",
                value: 2180
            },
            {
                name: "五菱",
                value: 2210
            },
            {
                name: "北汽新能源",
                value: 1832
            },
            {
                name: "斯柯达",
                value: 406
            },
            {
                name: "众泰",
                value: 877
            },
            {
                name: "荣威",
                value: 416
            },
            {
                name: "广汽传祺",
                value: 695
            },
            {
                name: "江淮",
                value: 701
            },
            {
                name: "标致",
                value: 556
            },
            {
                name: "捷豹",
                value: 328
            },
            {
                name: "玛莎拉蒂",
                value: 457
            },
            {
                name: "红旗",
                value: 903
            },
            {
                name: "雪铁龙",
                value: 573
            },
            {
                name: "兰博基尼",
                value: 740
            },
            {
                name: "东风风神",
                value: 723
            },
            {
                name: "领克",
                value: 1710
            },
            {
                name: "林肯",
                value: 456
            },
            {
                name: "法拉利",
                value: 2330
            },
            {
                name: "北京汽车",
                value: 569
            },
            {
                name: "劳斯莱斯",
                value: 682
            },
            {
                name: "英菲尼迪",
                value: 1295
            },
            {
                name: "长城",
                value: 322
            },

            {
                name: "迪奥",
                value: 66
            },
            {
                name: "香奈儿",
                value: 700
            },
            {
                name: "圣罗兰",
                value: 797
            },
            {
                name: "雅诗兰黛",
                value: 66
            },
            {
                name: "兰蔻",
                value: 2950
            },
            {
                name: "DHC",
                value: 411
            },
            {
                name: "阿玛尼",
                value: 987
            },
            {
                name: "纪梵希",
                value: 154
            },
            {
                name: "科颜氏",
                value: 68
            },
            {
                name: "巴黎欧莱雅",
                value: 729
            },
            {
                name: "雪花秀",
                value: 590
            },
            {
                name: "SK-II",
                value: 867
            },
            {
                name: "资生堂",
                value: 73
            },
            {
                name: "薇姿",
                value: 692
            },
            {
                name: "海蓝之谜",
                value: 148
            },
            {
                name: "悦诗风吟",
                value: 931
            },
            {
                name: "兰芝",
                value: 348
            },
            {
                name: "自然堂",
                value: 824
            },
            {
                name: "FOREO",
                value: 278
            },
            {
                name: "资生堂安热沙",
                value: 157
            },
            {
                name: "娇韵诗",
                value: 530
            },
            {
                name: "百雀羚",
                value: 42
            },
            {
                name: "MAC",
                value: 312
            },
            {
                name: "倩碧",
                value: 923
            },
            {
                name: "雅漾",
                value: 49
            },
            {
                name: "玉兰油",
                value: 858
            },
            {
                name: "RAY",
                value: 129
            },
            {
                name: "汤姆福特",
                value: 54
            },
            {
                name: "玫琳凯",
                value: 293
            },
            {
                name: "佰草集",
                value: 2180
            },
            {
                name: "希思黎",
                value: 257
            },
            {
                name: "肌肤之钥",
                value: 253
            },
            {
                name: "花皙蔻",
                value: 584
            },
            {
                name: "高田贤三",
                value: 66
            },
            {
                name: "屈臣氏",
                value: 464
            },
            {
                name: "瑞倪维儿",
                value: 725
            },
            {
                name: "如新",
                value: 124
            },
            {
                name: "娇兰",
                value: 652
            },
            {
                name: "范思哲",
                value: 972
            },
            {
                name: "馥蕾诗",
                value: 645
            },
            {
                name: "FANCL",
                value: 158
            },
            {
                name: "珀莱雅",
                value: 963
            },
            {
                name: "韩束",
                value: 15
            },
            {
                name: "JMSOLUTION",
                value: 556
            },
            {
                name: "丝芙兰",
                value: 450
            },
            {
                name: "WHOO后",
                value: 409
            },
            {
                name: "理肤泉",
                value: 11
            },
            {
                name: "祖马龙",
                value: 884
            },
            {
                name: "一叶子",
                value: 118
            },
            {
                name: "黎珐",
                value: 934
            }
        ];

        var option = {
            title: {
                show: true,
                text: "兴趣词云",
                textStyle: {
                    color: '#666666',
                    fontSize: 14
                }
            },
            tooltip: {
                trigger: "item"
            },
            toolbox: {
                show: true,
                feature: {
                    dataView: {
                        show: true
                    },
                    restore: {
                        show: true
                    }
                }
            },
            series: [{
                type: 'wordCloud',
                sizeRange: [10, 80],
                rotationRange: [-90, 90],
                rotationStep: 45,
                gridSize: 2,

                // The shape of the "cloud" to draw. Can be any polar equation represented as a
                // callback function, or a keyword present. Available presents are circle (default),
                // cardioid (apple or heart shape curve, the most known polar equation), diamond (
                // alias of square), triangle-forward, triangle, (alias of triangle-upright, pentagon, and star.
                shape: 'circle',

                //maskImage: maskImage,
                left: 'center',
                top: 'center',
                width: '60%',
                height: '80%',
                //right: null,
                //bottom: null,
                drawOutOfBound: false,
                textStyle: {
                    normal: {
                        color: function() {
                            // 随机从颜色序列中取色
                            var index = Math.floor((Math.random() * colorOrder.length));
                            //console.log('index:'+index);
                            //console.log('colorOrder:'+colorOrder[index]);
                            return colorOrder[index];
                        }
                    },
                    emphasis: {
                        color: '#60ACFC',
                        shadowBlur: 6,
                        shadowColor: '#dddddd'
                    }
                },
                data: keywords.sort(function(a, b) {
                    return b.value - a.value;
                })
            }]
        };
        var WordcloudInterests = echarts.init(document.getElementById('wordcloud_interests'));
        WordcloudInterests.setOption(option);

        // 浏览器窗口缩放，图表自动重绘适应浏览器窗口，codepen 中使用。
        window.onresize = function() {
            WordcloudInterests.resize();
        }

    }
</script>

<style>
    #wordcloud_interests {
        height: 600px;
    }
</style>