# Project: comiru
# Collection: smis 


## End-point: localhost:8000/api/v1/auth/login
auth login
### Method: POST
>```
>localhost:8000/api/v1/auth/login
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/auth/info
auth info
### Method: GET
>```
>localhost:8000/api/v1/auth/profile
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNlOTlmNjJlMzk5NjQxOTY0ODFiNTZhNjM1NDM3Nzk0MGI1MmQyNWM4MzgxYTVlNjZmYjUxYTc3NDQxY2EwZTBmMmMwYTZlNWFhNTRkMWVkIn0.eyJhdWQiOiIxIiwianRpIjoiY2U5OWY2MmUzOTk2NDE5NjQ4MWI1NmE2MzU0Mzc3OTQwYjUyZDI1YzgzODFhNWU2NmZiNTFhNzc0NDFjYTBlMGYyYzBhNmU1YWE1NGQxZWQiLCJpYXQiOjE2NzA5NDEyMjUsIm5iZiI6MTY3MDk0MTIyNSwiZXhwIjoxNzAyNDc3MjI1LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.g-EMqwZWSHMnNpBDy85FwjBoeJnmuDzu4JMyF89OgWsfqRQdCzTC8F-MO6QUhlyTgVGJwm9NdGa6_Z5I7YRJZPnlT5UkH0vDaa3og3qig5v9-vUdKiRR_LanbMsV0juq6Jn8IgtGjz5s4R7Y6C7dhBPqGOhIik_LzdjLS3a4FHxzhka2R0_2C-zuVXKxK9muI7NXGmMHe4klzI0bkYMA3Sd9pI5P_fwDdYha93uiDMcf6mN59hzSQsayg02shUEKiosfHmUEWMRxniBpnHSAv3ZWFp9UBp7JGIvselmj-zphCWu_g7KXSrkGYnH4N1iK5hDQvbpOKAsmAn2SnEeVXm9aYfWf5arQ-SloOumrMhno00NiHcS05qpuFlaMJCTTA0qCJxSn43-ioyKG-kdlut4IyaPgRSIZ34HWD4anYJ9kPGMMg1BKCxWpkJpfVGmSWy8u0HiGp_tgEw0pzgGASJ3qeSmASZEc8D7tLnRIeSlTTcYWEfDQTiKZDosq3nV9mUePOmN4-HW1jts0RFx6kT_PuIQg4b67oApy5HUzLZMxfwAkwuQl4RJdUBWKjf_GfBUCFeRSEGjYQ_Jky8No4wH3mLs-QX18qzXwr8GUQKkWO5k69Mjfn9T4HYLmYaKOzSQmAfepbPX5utroXzJtQ737RIIGd2OA_pdsB-tXTBs|

### Response

```json
{
    "user": {
        "id": 8,
        "name": "test_stu",
        "email": "test_stu@mail.com",
        "created_at": "2022-12-13 14:13:21",
        "updated_at": "2022-12-13 14:13:21",
        "status": 1,
        "type": 2,
        "can_bind": true
    }
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/auth/logout
auth logout
### Method: POST
>```
>localhost:8000/api/v1/auth/logout
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImIwZTMwNjBkNjM3N2Q2MTYyNmQwNDI2ZWI1ZjViODg3NGE5NGFhNmMzN2Y3NzMxYzNhZmU0ZDAzYjI3YTFiNzgxNGQzNDIwZWM4ODZkNzJhIn0.eyJhdWQiOiIxIiwianRpIjoiYjBlMzA2MGQ2Mzc3ZDYxNjI2ZDA0MjZlYjVmNWI4ODc0YTk0YWE2YzM3Zjc3MzFjM2FmZTRkMDNiMjdhMWI3ODE0ZDM0MjBlYzg4NmQ3MmEiLCJpYXQiOjE2NzA5MzcyNTIsIm5iZiI6MTY3MDkzNzI1MiwiZXhwIjoxNzAyNDczMjUyLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.nnnsLzQOirTT7SVeV3JMSWrzxhqYx2JFSc9JYm2gdLmDqevHG_VFLlDrCXxj0d7WT4_MNvPO_gbgrp5hPG2NKNHAmcy02GQWlGQm1feBODHf2jwKsIdW-dgq4JIazWMg0irFmx_NNL6c9x4awo4ziDrdtPcDhunDVVDYfAgnmLaNNdiskyu8WzYKOGP8gDMFmTJY52mgXIbXziOCXUzuuan5wxESintzgANXxchz1PFjB267TpwNb-gGWNld8NZl5AbkfavbURYjX94nAXnk5Rwu_D0i-295e4H7AVW4niWzxp8KMqFoY1wW2pfqqjMH9n7zRqIdeUDKU8mCak2lPT7N2BrPDRQpvg8yB3IVISNA5AaOSEReu0ibyJ8msJMhiVom1mpRQhNWsfmDBzLjN06ZYR3gRt31we_7Bi4cNr8DTFpql5dtKdnZxqo8zlcL7zDWk4xEH2Q0G5YR9LyP3TS5HXgZpQOtWoUDDGwTzAFnNyoSP0tCXhPEUn2UC6MFf904Yn0rlvBlGLa4CDCpB1PG_bhrYr72slZ7VjXUDBLtFTc0OWa8epC2IQx7Fyjb5N-6dS1jc-uM6MRbEWYOjoduWzzzWPLTjAj3D1SSHHWVQscg5GlyghPQvDtQ7q1jU_wDVcUYmR4UszZPYb0Jmjzx5V25DrYwB2LXeNhiIJY|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/register
User: 学校管理员注册
### Method: POST
>```
>localhost:8000/api/v1/user/register
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/create
User: 学生用户账号创建
### Method: POST
>```
>localhost:8000/api/v1/user/create
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/auth/student/login
User: 学生用户支持 name 登录
### Method: POST
>```
>localhost:8000/api/v1/auth/student/login
>```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/invite
User: 邀请教师
### Method: POST
>```
>localhost:8000/api/v1/user/invite
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhmNGU0OWRhODVhOTQyM2RjZjUzZDI2MWJmZjMzZjE3YWIyNGZhZGM2NDQ3NDlmNjMzNmVhNzAxOGE1OWVlZTAxNWE1MDkzZWQ3MjdiYzQ4In0.eyJhdWQiOiIxIiwianRpIjoiOGY0ZTQ5ZGE4NWE5NDIzZGNmNTNkMjYxYmZmMzNmMTdhYjI0ZmFkYzY0NDc0OWY2MzM2ZWE3MDE4YTU5ZWVlMDE1YTUwOTNlZDcyN2JjNDgiLCJpYXQiOjE2NzA5ODc4MzksIm5iZiI6MTY3MDk4NzgzOSwiZXhwIjoxNzAyNTIzODM5LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.OHawC_iOnXCPjVp72rXLNU0_i2tR7pycDLbr8ZBCqp1zbrf1kA7vdopDMegV05p58NGNY_XgCVC_O3F8AYGmj_rxnnRofy3XgtqognpnjliUOPqU4u40kMj7dcqDrq08LuxZgMAG31z1wyNsxt5ZV9O-Gy_RV81EWf6u_zK-o2YD_uu2tURbb2c2tbIsnx5j7bEvCyV1GX8Cfp-fET3XUE0VWXmriirgjqW2z7x5l8vsWeCkUiPGLlA1FBezx6nsFFpabWyJhyp98oC8OXdqgXJGUHBXNZt9XsyJc8NxnpmRVB9S_OfwoToNBerTG-AJlne_-yaSPYsKgkwzNcqIDndx5Lwch-7GMBbgJKCocZSwb-YyFsb5qfqcH7htCyReGDT74RIKPkT4b7wP08oittiyM6CL2eB0yGtcFQFgARyXK--JnRB4NnagZTB6MuAgTQHyWLj-YzvBPXTQdDiJ850FBDq5E0xU_ad4rzety7PZyTppUd8BfZbOghA3aX919Pb2qxgthOyrWhLDzwz1bO1Dx0EUip9OqYJezFXfLYPD1sJWWjZm86xj1vCSIQgd0uM6RCljhzZcWWudvM3v3iE9X0duGl5ESUoJSM6L-kKPlcfsNtYQzVP7Yt0QQ3QUG9435MP86RD2e5QP0h4-7VHGV5TGiBjJcGUdwqS-7Dw|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/follower
friend：关注用户列表
### Method: GET
>```
>localhost:8000/api/v1/user/follower
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFhOGQ0NTdhY2NiYTI5OTI0MWZhNDgzY2Y3NTBjOWZhMTA2ZTc1OTkxODQ4MjYyNzhjYzBiNzA4NDljNzJkMjA4OGQ3ZmFhNDEwMWExM2U0In0.eyJhdWQiOiIxIiwianRpIjoiYWE4ZDQ1N2FjY2JhMjk5MjQxZmE0ODNjZjc1MGM5ZmExMDZlNzU5OTE4NDgyNjI3OGNjMGI3MDg0OWM3MmQyMDg4ZDdmYWE0MTAxYTEzZTQiLCJpYXQiOjE2NzEwMDcwOTYsIm5iZiI6MTY3MTAwNzA5NiwiZXhwIjoxNzAyNTQzMDk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.gKD9HNuxnuHzDe9ffREvzufYLxNswd_92p60RPVhw57JNXNEDX6GE0uKh_wXFbh_cqGgwzjOcEu8l4ncsiN_yurCwCWOBAi4fpoqAlidBTCV90SLStqVK_wya-flK7SIXqXMKSOLgrZMHZrCMFSD7x8PwBOZopyM_ziBAV9fvM_r2BARxDvLNJHNOAcml8TLMXRL981VE8YHlAa5rktWP3eCNvQBrJAw3V701Senv2o6LBtZLakfAa7XmneZ02Xw54XZqkGQbUDBQpV3gllGwqg-5KufweO2udCsYik0_v2CPcoNipWbcdgYQxNe2m5nVHV9GV-xCeYN6e9Pw0LKaIyUGlsKi-UCelL_rlJeNe1f1A4GNTmgsmeNDfkBTb33ichQHVWGW4zenqS_a3ww0xQvOzt4LiCiPizcoFL94VsKkCJ7EzE29mznhullp1moT4iuKs0cdp70A3Nfw1PkcnViyjwK65fXvFL92Zw1dpViLMazzOpmHrWGfK6fT4zFxiOGPLuAO--XAjzcrk2m43CQjaqxCQFe9vjkO9O6ThvVbOCPHWDsRm_n4cDO7NC4BG2qfNGADOJI7e3mntocUTjzLM-2gA7doQodS3qQu2lyJJJLe1JsZCU5YqHWoHQpVae05_07Ki-vJaZyQqaofkVDMSGAP0gbIZqwjkwULNQ|

### Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 8,
            "name": "test_stu",
            "email": "test_stu@mail.com",
            "created_at": "2022-12-13 14:13:21",
            "updated_at": "2022-12-13 14:13:21",
            "status": 1,
            "type": 2,
            "pivot": {
                "user_id": 6,
                "follower_id": 8
            }
        }
    ],
    "first_page_url": "http://localhost:8000/api/v1/user/follower?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/v1/user/follower?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/v1/user/follower",
    "per_page": 30,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/following
friend: 关注列表
### Method: GET
>```
>localhost:8000/api/v1/user/following
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFhOGQ0NTdhY2NiYTI5OTI0MWZhNDgzY2Y3NTBjOWZhMTA2ZTc1OTkxODQ4MjYyNzhjYzBiNzA4NDljNzJkMjA4OGQ3ZmFhNDEwMWExM2U0In0.eyJhdWQiOiIxIiwianRpIjoiYWE4ZDQ1N2FjY2JhMjk5MjQxZmE0ODNjZjc1MGM5ZmExMDZlNzU5OTE4NDgyNjI3OGNjMGI3MDg0OWM3MmQyMDg4ZDdmYWE0MTAxYTEzZTQiLCJpYXQiOjE2NzEwMDcwOTYsIm5iZiI6MTY3MTAwNzA5NiwiZXhwIjoxNzAyNTQzMDk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.gKD9HNuxnuHzDe9ffREvzufYLxNswd_92p60RPVhw57JNXNEDX6GE0uKh_wXFbh_cqGgwzjOcEu8l4ncsiN_yurCwCWOBAi4fpoqAlidBTCV90SLStqVK_wya-flK7SIXqXMKSOLgrZMHZrCMFSD7x8PwBOZopyM_ziBAV9fvM_r2BARxDvLNJHNOAcml8TLMXRL981VE8YHlAa5rktWP3eCNvQBrJAw3V701Senv2o6LBtZLakfAa7XmneZ02Xw54XZqkGQbUDBQpV3gllGwqg-5KufweO2udCsYik0_v2CPcoNipWbcdgYQxNe2m5nVHV9GV-xCeYN6e9Pw0LKaIyUGlsKi-UCelL_rlJeNe1f1A4GNTmgsmeNDfkBTb33ichQHVWGW4zenqS_a3ww0xQvOzt4LiCiPizcoFL94VsKkCJ7EzE29mznhullp1moT4iuKs0cdp70A3Nfw1PkcnViyjwK65fXvFL92Zw1dpViLMazzOpmHrWGfK6fT4zFxiOGPLuAO--XAjzcrk2m43CQjaqxCQFe9vjkO9O6ThvVbOCPHWDsRm_n4cDO7NC4BG2qfNGADOJI7e3mntocUTjzLM-2gA7doQodS3qQu2lyJJJLe1JsZCU5YqHWoHQpVae05_07Ki-vJaZyQqaofkVDMSGAP0gbIZqwjkwULNQ|


### Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 8,
            "name": "test_stu",
            "email": "test_stu@mail.com",
            "created_at": "2022-12-13 14:13:21",
            "updated_at": "2022-12-13 14:13:21",
            "status": 1,
            "type": 2,
            "pivot": {
                "follower_id": 6,
                "user_id": 8
            }
        }
    ],
    "first_page_url": "http://localhost:8000/api/v1/user/following?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/v1/user/following?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/v1/user/following",
    "per_page": 30,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/follow/8
friend: 关注
### Method: POST
>```
>localhost:8000/api/v1/user/follow/8
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFhOGQ0NTdhY2NiYTI5OTI0MWZhNDgzY2Y3NTBjOWZhMTA2ZTc1OTkxODQ4MjYyNzhjYzBiNzA4NDljNzJkMjA4OGQ3ZmFhNDEwMWExM2U0In0.eyJhdWQiOiIxIiwianRpIjoiYWE4ZDQ1N2FjY2JhMjk5MjQxZmE0ODNjZjc1MGM5ZmExMDZlNzU5OTE4NDgyNjI3OGNjMGI3MDg0OWM3MmQyMDg4ZDdmYWE0MTAxYTEzZTQiLCJpYXQiOjE2NzEwMDcwOTYsIm5iZiI6MTY3MTAwNzA5NiwiZXhwIjoxNzAyNTQzMDk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.gKD9HNuxnuHzDe9ffREvzufYLxNswd_92p60RPVhw57JNXNEDX6GE0uKh_wXFbh_cqGgwzjOcEu8l4ncsiN_yurCwCWOBAi4fpoqAlidBTCV90SLStqVK_wya-flK7SIXqXMKSOLgrZMHZrCMFSD7x8PwBOZopyM_ziBAV9fvM_r2BARxDvLNJHNOAcml8TLMXRL981VE8YHlAa5rktWP3eCNvQBrJAw3V701Senv2o6LBtZLakfAa7XmneZ02Xw54XZqkGQbUDBQpV3gllGwqg-5KufweO2udCsYik0_v2CPcoNipWbcdgYQxNe2m5nVHV9GV-xCeYN6e9Pw0LKaIyUGlsKi-UCelL_rlJeNe1f1A4GNTmgsmeNDfkBTb33ichQHVWGW4zenqS_a3ww0xQvOzt4LiCiPizcoFL94VsKkCJ7EzE29mznhullp1moT4iuKs0cdp70A3Nfw1PkcnViyjwK65fXvFL92Zw1dpViLMazzOpmHrWGfK6fT4zFxiOGPLuAO--XAjzcrk2m43CQjaqxCQFe9vjkO9O6ThvVbOCPHWDsRm_n4cDO7NC4BG2qfNGADOJI7e3mntocUTjzLM-2gA7doQodS3qQu2lyJJJLe1JsZCU5YqHWoHQpVae05_07Ki-vJaZyQqaofkVDMSGAP0gbIZqwjkwULNQ|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/follow/8
friend: 取关
### Method: DELETE
>```
>localhost:8000/api/v1/user/follow/8
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFhOGQ0NTdhY2NiYTI5OTI0MWZhNDgzY2Y3NTBjOWZhMTA2ZTc1OTkxODQ4MjYyNzhjYzBiNzA4NDljNzJkMjA4OGQ3ZmFhNDEwMWExM2U0In0.eyJhdWQiOiIxIiwianRpIjoiYWE4ZDQ1N2FjY2JhMjk5MjQxZmE0ODNjZjc1MGM5ZmExMDZlNzU5OTE4NDgyNjI3OGNjMGI3MDg0OWM3MmQyMDg4ZDdmYWE0MTAxYTEzZTQiLCJpYXQiOjE2NzEwMDcwOTYsIm5iZiI6MTY3MTAwNzA5NiwiZXhwIjoxNzAyNTQzMDk2LCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.gKD9HNuxnuHzDe9ffREvzufYLxNswd_92p60RPVhw57JNXNEDX6GE0uKh_wXFbh_cqGgwzjOcEu8l4ncsiN_yurCwCWOBAi4fpoqAlidBTCV90SLStqVK_wya-flK7SIXqXMKSOLgrZMHZrCMFSD7x8PwBOZopyM_ziBAV9fvM_r2BARxDvLNJHNOAcml8TLMXRL981VE8YHlAa5rktWP3eCNvQBrJAw3V701Senv2o6LBtZLakfAa7XmneZ02Xw54XZqkGQbUDBQpV3gllGwqg-5KufweO2udCsYik0_v2CPcoNipWbcdgYQxNe2m5nVHV9GV-xCeYN6e9Pw0LKaIyUGlsKi-UCelL_rlJeNe1f1A4GNTmgsmeNDfkBTb33ichQHVWGW4zenqS_a3ww0xQvOzt4LiCiPizcoFL94VsKkCJ7EzE29mznhullp1moT4iuKs0cdp70A3Nfw1PkcnViyjwK65fXvFL92Zw1dpViLMazzOpmHrWGfK6fT4zFxiOGPLuAO--XAjzcrk2m43CQjaqxCQFe9vjkO9O6ThvVbOCPHWDsRm_n4cDO7NC4BG2qfNGADOJI7e3mntocUTjzLM-2gA7doQodS3qQu2lyJJJLe1JsZCU5YqHWoHQpVae05_07Ki-vJaZyQqaofkVDMSGAP0gbIZqwjkwULNQ|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: http://127.0.0.1:8000/api/v1/notification/send
Realtime: 公告
### Method: POST
>```
>http://127.0.0.1:8000/api/v1/notification/send
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU2Yzk2M2I5MmE4Zjg4ZjJlMTAzOTU4MTU0MTRiN2ZiZDIzMWY3NGY4Y2FmNWJjNTA0MThiMDFkNDFmNWUzMTA4Y2RhNTIyNWMyNjA5MDZlIn0.eyJhdWQiOiIxIiwianRpIjoiZTZjOTYzYjkyYThmODhmMmUxMDM5NTgxNTQxNGI3ZmJkMjMxZjc0ZjhjYWY1YmM1MDQxOGIwMWQ0MWY1ZTMxMDhjZGE1MjI1YzI2MDkwNmUiLCJpYXQiOjE2NzExMDQ1MDIsIm5iZiI6MTY3MTEwNDUwMiwiZXhwIjoxNzAyNjQwNTAyLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.tZP_lA67OTJOpTfmKhSOQIH5Vb0k99lCaCF5qBeQju2Ev0P6yyKvdkKtVQ4jWSnIUIeYMNo8D1GbWtCRLg2oVRUGqLXiDCPBLV5CMGeeGhzNTZjTsJlmMIbgZKMeMnqg1mQUFz9vxVbIpEOOjqkUTLQPixUh9RFYboAhbdpK5u2v3ib8YddzGtWi3skf1aeYWt4F2I5_O0pLE78rXLAm1tREJAbMJRrzOz9hLzoP9OijdA5mIuBJqD1lhynbjWnACScvI_BD81MHwpvNRd0cRCDr3i0_ezVoNMsLcEUDOM_2d1ZGWSAbc-7sU6ZwfjzqL_URfF65YmLfw8xu_gUSElh9KNoTR3hXxfDQyrqCIfMLlCYo4CFbyoM_Lu8DCV3u4p5mL8e7tuen0j7hrGix64CkgsPygwc27V_0n5dR325_-EkkxeFx_gN6yv53SbiE2MAb0j2Fk4ac-5P6HddPTlHF1yyWsjh4YFNQ9lmcMCX6gfKfrWy4_pkQJbh77NP6-OkkqGQXnyR5Wrh5mz9FyhIQzdV_SSm2OzA7-o9MkHQSEN_fOV3Ox1cUiUxkpHEVONm9tkF3pXRFzh4xvr5PvT-tHRNNADDdJ3qVo9QMLkHGrjbknVwWJbez2iWbi6iXOYV-38kFPWjKeBhikcIWO33-qZVUJqnUO5okHFUAquA|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: http://127.0.0.1:8000/api/v1/chat/send
Realtime: chat
### Method: POST
>```
>http://127.0.0.1:8000/api/v1/chat/send
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU2Yzk2M2I5MmE4Zjg4ZjJlMTAzOTU4MTU0MTRiN2ZiZDIzMWY3NGY4Y2FmNWJjNTA0MThiMDFkNDFmNWUzMTA4Y2RhNTIyNWMyNjA5MDZlIn0.eyJhdWQiOiIxIiwianRpIjoiZTZjOTYzYjkyYThmODhmMmUxMDM5NTgxNTQxNGI3ZmJkMjMxZjc0ZjhjYWY1YmM1MDQxOGIwMWQ0MWY1ZTMxMDhjZGE1MjI1YzI2MDkwNmUiLCJpYXQiOjE2NzExMDQ1MDIsIm5iZiI6MTY3MTEwNDUwMiwiZXhwIjoxNzAyNjQwNTAyLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.tZP_lA67OTJOpTfmKhSOQIH5Vb0k99lCaCF5qBeQju2Ev0P6yyKvdkKtVQ4jWSnIUIeYMNo8D1GbWtCRLg2oVRUGqLXiDCPBLV5CMGeeGhzNTZjTsJlmMIbgZKMeMnqg1mQUFz9vxVbIpEOOjqkUTLQPixUh9RFYboAhbdpK5u2v3ib8YddzGtWi3skf1aeYWt4F2I5_O0pLE78rXLAm1tREJAbMJRrzOz9hLzoP9OijdA5mIuBJqD1lhynbjWnACScvI_BD81MHwpvNRd0cRCDr3i0_ezVoNMsLcEUDOM_2d1ZGWSAbc-7sU6ZwfjzqL_URfF65YmLfw8xu_gUSElh9KNoTR3hXxfDQyrqCIfMLlCYo4CFbyoM_Lu8DCV3u4p5mL8e7tuen0j7hrGix64CkgsPygwc27V_0n5dR325_-EkkxeFx_gN6yv53SbiE2MAb0j2Fk4ac-5P6HddPTlHF1yyWsjh4YFNQ9lmcMCX6gfKfrWy4_pkQJbh77NP6-OkkqGQXnyR5Wrh5mz9FyhIQzdV_SSm2OzA7-o9MkHQSEN_fOV3Ox1cUiUxkpHEVONm9tkF3pXRFzh4xvr5PvT-tHRNNADDdJ3qVo9QMLkHGrjbknVwWJbez2iWbi6iXOYV-38kFPWjKeBhikcIWO33-qZVUJqnUO5okHFUAquA|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/user/school
User: 加入的学校
### Method: GET
>```
>localhost:8000/api/v1/user/school
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNlOTlmNjJlMzk5NjQxOTY0ODFiNTZhNjM1NDM3Nzk0MGI1MmQyNWM4MzgxYTVlNjZmYjUxYTc3NDQxY2EwZTBmMmMwYTZlNWFhNTRkMWVkIn0.eyJhdWQiOiIxIiwianRpIjoiY2U5OWY2MmUzOTk2NDE5NjQ4MWI1NmE2MzU0Mzc3OTQwYjUyZDI1YzgzODFhNWU2NmZiNTFhNzc0NDFjYTBlMGYyYzBhNmU1YWE1NGQxZWQiLCJpYXQiOjE2NzA5NDEyMjUsIm5iZiI6MTY3MDk0MTIyNSwiZXhwIjoxNzAyNDc3MjI1LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.g-EMqwZWSHMnNpBDy85FwjBoeJnmuDzu4JMyF89OgWsfqRQdCzTC8F-MO6QUhlyTgVGJwm9NdGa6_Z5I7YRJZPnlT5UkH0vDaa3og3qig5v9-vUdKiRR_LanbMsV0juq6Jn8IgtGjz5s4R7Y6C7dhBPqGOhIik_LzdjLS3a4FHxzhka2R0_2C-zuVXKxK9muI7NXGmMHe4klzI0bkYMA3Sd9pI5P_fwDdYha93uiDMcf6mN59hzSQsayg02shUEKiosfHmUEWMRxniBpnHSAv3ZWFp9UBp7JGIvselmj-zphCWu_g7KXSrkGYnH4N1iK5hDQvbpOKAsmAn2SnEeVXm9aYfWf5arQ-SloOumrMhno00NiHcS05qpuFlaMJCTTA0qCJxSn43-ioyKG-kdlut4IyaPgRSIZ34HWD4anYJ9kPGMMg1BKCxWpkJpfVGmSWy8u0HiGp_tgEw0pzgGASJ3qeSmASZEc8D7tLnRIeSlTTcYWEfDQTiKZDosq3nV9mUePOmN4-HW1jts0RFx6kT_PuIQg4b67oApy5HUzLZMxfwAkwuQl4RJdUBWKjf_GfBUCFeRSEGjYQ_Jky8No4wH3mLs-QX18qzXwr8GUQKkWO5k69Mjfn9T4HYLmYaKOzSQmAfepbPX5utroXzJtQ737RIIGd2OA_pdsB-tXTBs|

### Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 12,
            "name": "清华大学",
            "creator_id": 15,
            "status": 0,
            "created_at": "2022-12-19 16:26:26",
            "updated_at": "2022-12-19 16:26:26",
            "pivot": {
                "user_id": 8,
                "school_id": 12,
                "type": 1
            }
        }
    ],
    "first_page_url": "http://localhost:8000/api/v1/user/school?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/v1/user/school?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/v1/user/school",
    "per_page": 30,
    "prev_page_url": null,
    "to": 1,
    "total": 1
}
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/school/store
创建学校
### Method: POST
>```
>localhost:8000/api/v1/school/store
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNkYTU0YjdhZTI0OTdkZTgwNDE3NGFiYjQwZmIzODUzYjVmMTdjZWQ2ZmI1ZGI5MzljZmY0MTI5YzY4MTkwNGI4OTI4MDkzNGEyYTg4MjVmIn0.eyJhdWQiOiIxIiwianRpIjoiY2RhNTRiN2FlMjQ5N2RlODA0MTc0YWJiNDBmYjM4NTNiNWYxN2NlZDZmYjVkYjkzOWNmZjQxMjljNjgxOTA0Yjg5MjgwOTM0YTJhODgyNWYiLCJpYXQiOjE2NzA5Mzk0OTEsIm5iZiI6MTY3MDkzOTQ5MSwiZXhwIjoxNzAyNDc1NDkxLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.W3DIi3e2J4Hng75zrGHdQMn_ooDqUV0s_ugBe7hNkldPI3axFCTVYtzvg8eQdZalzc1PgM-RN6Wn4_U-iyduXAvJlzXuxOXIMcDiwALfXQUo3HOJE9Luy3CuxW8OAm2Lbwu7nq1xO7KxVtgjzNaV-e60gHudqI59KwM26LLjUUIEcKAGDQMSs4DeWDItj3fzrXMnByfpLkEH-roNj5xKr2I58nEfzE5rDX6qEbyc1hUMO2MRvuDlQtrLkMe7aRc7lE-P2h_vQiQV6eukiwW-pvUdlhdPzUZA7MJWucv2uiPfyDct126z434IUV0PUNVtc_4q8WSn95HOwp3iHWUBATaaHIQUFb4rnzZjXSO6Tnw9wu5UV94DBlEm7tU8ST5ApNBSGy4-jm4ap8YlFqbiFF6eX8Vb_Zlquo5YQx6bya5JfqmvRwg6aSuHFmdh1KAa8O2kcR266BNrhocXKwTh_HwcD0vuKHIcLL2sgOhJLn2fGu6lHAOSXEjkgBrJkyT89e5eb4QpW2_Ml8R-tT3HNg0NEhWPdpAsNZ2AaHTNHcLXfZWlLs8SRTcjAwcgKtUwcJX9-T5bhJz3iXLU9U5oOkiVY0-XyAbrXjFCtsf0PHOy27B0lXADcJO4eQEQBIeAhXc3vkWScvC4zBbRa3N2JCivLE78eDn_9IaN8Q3h6-c|



⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/school/browser
User: 加入的学校
### Method: GET
>```
>localhost:8000/api/v1/school/browser
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNlOTlmNjJlMzk5NjQxOTY0ODFiNTZhNjM1NDM3Nzk0MGI1MmQyNWM4MzgxYTVlNjZmYjUxYTc3NDQxY2EwZTBmMmMwYTZlNWFhNTRkMWVkIn0.eyJhdWQiOiIxIiwianRpIjoiY2U5OWY2MmUzOTk2NDE5NjQ4MWI1NmE2MzU0Mzc3OTQwYjUyZDI1YzgzODFhNWU2NmZiNTFhNzc0NDFjYTBlMGYyYzBhNmU1YWE1NGQxZWQiLCJpYXQiOjE2NzA5NDEyMjUsIm5iZiI6MTY3MDk0MTIyNSwiZXhwIjoxNzAyNDc3MjI1LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.g-EMqwZWSHMnNpBDy85FwjBoeJnmuDzu4JMyF89OgWsfqRQdCzTC8F-MO6QUhlyTgVGJwm9NdGa6_Z5I7YRJZPnlT5UkH0vDaa3og3qig5v9-vUdKiRR_LanbMsV0juq6Jn8IgtGjz5s4R7Y6C7dhBPqGOhIik_LzdjLS3a4FHxzhka2R0_2C-zuVXKxK9muI7NXGmMHe4klzI0bkYMA3Sd9pI5P_fwDdYha93uiDMcf6mN59hzSQsayg02shUEKiosfHmUEWMRxniBpnHSAv3ZWFp9UBp7JGIvselmj-zphCWu_g7KXSrkGYnH4N1iK5hDQvbpOKAsmAn2SnEeVXm9aYfWf5arQ-SloOumrMhno00NiHcS05qpuFlaMJCTTA0qCJxSn43-ioyKG-kdlut4IyaPgRSIZ34HWD4anYJ9kPGMMg1BKCxWpkJpfVGmSWy8u0HiGp_tgEw0pzgGASJ3qeSmASZEc8D7tLnRIeSlTTcYWEfDQTiKZDosq3nV9mUePOmN4-HW1jts0RFx6kT_PuIQg4b67oApy5HUzLZMxfwAkwuQl4RJdUBWKjf_GfBUCFeRSEGjYQ_Jky8No4wH3mLs-QX18qzXwr8GUQKkWO5k69Mjfn9T4HYLmYaKOzSQmAfepbPX5utroXzJtQ737RIIGd2OA_pdsB-tXTBs|

### Response
```json
{
    "current_page": 1,
    "data": [
        {
            "id": 11,
            "name": "北京大学",
            "creator_id": 6,
            "status": 0,
            "created_at": "2022-12-13 14:05:34",
            "updated_at": "2022-12-13 14:05:34",
            "with_login_users": []
        },
        {
            "id": 12,
            "name": "清华大学",
            "creator_id": 15,
            "status": 0,
            "created_at": "2022-12-19 16:26:26",
            "updated_at": "2022-12-19 16:26:26",
            "with_login_users": [
                {
                    "id": 8,
                    "name": "test_stu",
                    "email": "test_stu@mail.com",
                    "created_at": "2022-12-13 14:13:21",
                    "updated_at": "2022-12-13 14:13:21",
                    "status": 1,
                    "type": 2,
                    "pivot": {
                        "school_id": 12,
                        "user_id": 8
                    }
                }
            ]
        },
        {
            "id": 14,
            "name": "上海交大",
            "creator_id": 6,
            "status": 0,
            "created_at": "2022-12-20 13:26:55",
            "updated_at": "2022-12-20 13:26:55",
            "with_login_users": []
        }
    ],
    "first_page_url": "http://localhost:8000/api/v1/school/browser?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://localhost:8000/api/v1/school/browser?page=1",
    "next_page_url": null,
    "path": "http://localhost:8000/api/v1/school/browser",
    "per_page": 30,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```


⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃

## End-point: localhost:8000/api/v1/school/browserAll
User: 加入的学校
### Method: GET
>```
>localhost:8000/api/v1/school/browserAll
>```
### Headers

|Content-Type|Value|
|---|---|
|Accept|application/json|


### Headers

|Content-Type|Value|
|---|---|
|Authorization|Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImNlOTlmNjJlMzk5NjQxOTY0ODFiNTZhNjM1NDM3Nzk0MGI1MmQyNWM4MzgxYTVlNjZmYjUxYTc3NDQxY2EwZTBmMmMwYTZlNWFhNTRkMWVkIn0.eyJhdWQiOiIxIiwianRpIjoiY2U5OWY2MmUzOTk2NDE5NjQ4MWI1NmE2MzU0Mzc3OTQwYjUyZDI1YzgzODFhNWU2NmZiNTFhNzc0NDFjYTBlMGYyYzBhNmU1YWE1NGQxZWQiLCJpYXQiOjE2NzA5NDEyMjUsIm5iZiI6MTY3MDk0MTIyNSwiZXhwIjoxNzAyNDc3MjI1LCJzdWIiOiI4Iiwic2NvcGVzIjpbXX0.g-EMqwZWSHMnNpBDy85FwjBoeJnmuDzu4JMyF89OgWsfqRQdCzTC8F-MO6QUhlyTgVGJwm9NdGa6_Z5I7YRJZPnlT5UkH0vDaa3og3qig5v9-vUdKiRR_LanbMsV0juq6Jn8IgtGjz5s4R7Y6C7dhBPqGOhIik_LzdjLS3a4FHxzhka2R0_2C-zuVXKxK9muI7NXGmMHe4klzI0bkYMA3Sd9pI5P_fwDdYha93uiDMcf6mN59hzSQsayg02shUEKiosfHmUEWMRxniBpnHSAv3ZWFp9UBp7JGIvselmj-zphCWu_g7KXSrkGYnH4N1iK5hDQvbpOKAsmAn2SnEeVXm9aYfWf5arQ-SloOumrMhno00NiHcS05qpuFlaMJCTTA0qCJxSn43-ioyKG-kdlut4IyaPgRSIZ34HWD4anYJ9kPGMMg1BKCxWpkJpfVGmSWy8u0HiGp_tgEw0pzgGASJ3qeSmASZEc8D7tLnRIeSlTTcYWEfDQTiKZDosq3nV9mUePOmN4-HW1jts0RFx6kT_PuIQg4b67oApy5HUzLZMxfwAkwuQl4RJdUBWKjf_GfBUCFeRSEGjYQ_Jky8No4wH3mLs-QX18qzXwr8GUQKkWO5k69Mjfn9T4HYLmYaKOzSQmAfepbPX5utroXzJtQ737RIIGd2OA_pdsB-tXTBs|


### Response

```json
[
    {
        "id": 12,
        "name": "清华大学",
        "creator_id": 15,
        "status": 0,
        "created_at": "2022-12-19 16:26:26",
        "updated_at": "2022-12-19 16:26:26"
    }
]
```

⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃ ⁃
_________________________________________________
Powered By: [postman-to-markdown](https://github.com/bautistaj/postman-to-markdown/)
